<?php

namespace App\Repositories;

use App\Models\Member;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use function Sodium\add;

class OrderRepository
{
    const PER_PAGE = 10;
    /**
     * @param $userId
     * @return \Illuminate\Support\Collection
     */
    public function getOrderByUserId($userId)
    {
        return DB::table('order_detail')
            ->join('order', 'order.id', '=', 'order_detail.order_id')
            ->join('member', 'order.member_id', '=', 'member.id')
            ->join('club_book', 'order_detail.club_book_id', '=', 'club_book.id')
            ->join('book', 'club_book.book_id', '=', 'book.id')
            ->where('member.user_id', $userId)
            ->select(
                'order.*',
                'order_detail.*',
                'member.full_name as full_name',
                'member.phone_number as phone_number',
                'book.name as book_name'
            )
            ->get();
    }

    /**
     * @param $clubBookId
     * @return \Illuminate\Support\Collection
     */
    public function getClubBookName($clubBookId)
    {
        return DB::table('club_book')
            ->select(
                'club_book.id',
                'club_book.club_id as club_id',
                'book.name as name'
            )
            ->join('book', 'club_book.book_id', '=', 'book.id')
            ->whereIn('club_book.id', $clubBookId)
            ->get();
    }


    /**
     * @return \Illuminate\Support\Collection
     */
    public function getOrderList()
    {
        return DB::table('order')
            ->select(
                'order.*',
                'order_detail.*',
                'member.full_name as full_name',
                'member.phone_number as phone_number',
                'book.name as book_name'
            )
            ->join('order_detail', 'order.id', '=', 'order_detail.order_id')
            ->join('member', 'order.member_id', '=', 'member.id')
            ->join('club_book', 'order_detail.club_book_id', '=', 'club_book.id')
            ->join('book', 'club_book.book_id', '=', 'book.id')
            ->select('order.*', 'order_detail.*', 'member.full_name as full_name',
                'member.phone_number as phone_number', 'book.name as book_name')
            ->orderBy('order_detail.order_status', 'ASC')
            ->orderBy('order_detail.return_date', 'ASC')
            ->orderBy('order.order_date', 'DESC')
            ->get();
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function orderConfirm(int $id)
    {
        return OrderDetail::where('id', $id)->update([
            'order_status' => Order::ORDER_STATUS_CREATED,]);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function orderReturn(int $id)
    {
        $return_day = Carbon::now()->format('Y-m-d');
        return OrderDetail::where('id', $id)->update([
            'order_status' => Order::ORDER_STATUS_RETURN,
            'return_date' => $return_day,]);
    }

    public function getUser($userId)
    {
        return DB::table('users')
            ->where('id', $userId)
            ->select('users.*')
            ->first();
    }

    public function orderOfflineCreate($order, $member)
    {
        $bookOrders = $order['club_book_ids'];
        try {
            $newOrder = new Order();
            $newOrder->member_id = $member;
            $newOrder->club_id = $order['clubId'];
            $newOrder->order_date = $order['order_date'];
            $newOrder->due_date = $order['due_date'];
            $newOrder->save();

            $newOrderDetailList = [];
            foreach ($bookOrders as $bookOrder) {
                $newOrderDetail = [
                    'order_id' => $newOrder->id,
                    'club_book_id' => $bookOrder,
                    'return_date' => null,
                    'overdue_day_count' => 0,
                    'order_status' => 1,
                    'note' => $order['note'],
                ];
                $newOrderDetailList[] = $newOrderDetail;
            }
            OrderDetail::insert($newOrderDetailList);
        } catch (\Exception $e) {
            DB::rollBack();
            // Log the error
            Log::error('Error create data: ' . $e->getMessage());
        }
    }

    public function orderOnlineCreate($order, $member)
    {
        $bookOrders = json_decode($order['clubBook']);
        try {
            $newOrderId = DB::table('order')->insertGetId([
                'member_id' => $member,
                'club_id' => $bookOrders[0]->club_id,
                'order_date' => $order['order_date'],
                'due_date' => $order['due_date'],
                ]);
            $newOrderDetailList = [];
            foreach ($bookOrders as $bookOrder) {
                $newOrderDetail = [
                    'order_id' => $newOrderId,
                    'club_book_id' => $bookOrder->id,
                    'return_date' => null,
                    'overdue_day_count' => 0,
                    'order_status' => 0,
                    'note' => $order['note'],
                ];
                $newOrderDetailList[] = $newOrderDetail;
            }
            OrderDetail::insert($newOrderDetailList);
        } catch (\Exception $e) {
            DB::rollBack();
            // Log the error
            Log::error('Error updating data: ' . $e->getMessage());
        }
    }

    /**
     * @param int $club_book_id
     * @return object|null
     */
    public function currentCountBook(int $club_book_id)
    {
        return DB::table('club_book')
            ->select('club_book.current_count as current_count', 'book.name as book_name')
            ->join('book', 'book.id', '=', 'club_book.book_id')
            ->where('club_book.id', $club_book_id)
            ->first();
    }

    public function countBookBorrowing(int $memberId)
    {
        return DB::table('order')
            ->select('order.id', 'order_detail.id')
            ->join('order_detail', 'order.id', '=', 'order_detail.order_id')
            ->join('member', 'order.member_id', '=', 'member.id')
            ->join('club_book', 'order_detail.club_book_id', '=', 'club_book.id')
            ->where('member.id', $memberId)
            ->where(function ($query) {
                $query->where('order_detail.order_status', Order::ORDER_STATUS_PENDING)
                    ->orWhere('order_detail.order_status', Order::ORDER_STATUS_CREATED)
                    ->orWhere('order_detail.order_status', Order::ORDER_STATUS_OVER_DUA_DATE);
            })
            ->count();
    }

    public function checkNewMember(string $phone_number)
    {
        return DB::table('member')
            ->select('member.id as id')
            ->where('member.phone_number', $phone_number)
            ->first();
    }

    public function createNewMember($member)
    {
        $newMember = new Member();
        try {
            $newMember->address = $member['address'];
            $newMember->phone_number = $member['phone_number'];
            $newMember->full_name = $member['full_name'];
            $newMember->save();
        } catch (\Exception $e) {
            DB::rollBack();
            // Log the error
            Log::error('Error updating data: ' . $e->getMessage());
        }
        return $newMember;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getListBookCalendar()
    {
        return DB::table('order_detail')
            ->select('book.name as title', 'order.order_date as start', 'order.due_date as due_date',
                'order_detail.return_date as end', 'club.name as from_club', 'member.full_name as borrower',
                'order_detail.order_status as order_status')
            ->join('order', 'order.id', '=', 'order_detail.order_id')
            ->join('member', 'order.member_id', '=', 'member.id')
            ->join('club_book', 'order_detail.club_book_id', '=', 'club_book.id')
            ->join('book', 'club_book.book_id', '=', 'book.id')
            ->join('club', 'order.club_id', '=', 'club.id')
            ->get();
    }

    public function checkUserMember($userId)
    {
        return DB::table('member')
            ->where('member.user_id', $userId)
            ->select('member.id as id')
            ->first();
    }

    /**
     * @param $request
     * @param $user
     * @return Member|void
     */
    public function createNewMemberForOrderOnline($member, $user)
    {
        $newMember = new Member();
        try {
            $newMember->user_id = $user->id;
            $newMember->address = $member['address'];
            $newMember->phone_number = $member['phone_number'];
            $newMember->full_name = $member['full_name'];
            $newMember->birth_date = optional(Carbon::parse($user->birth_date))->format('Y-m-d');
            $newMember->email = $user->email;
            $newMember->save();
            return $newMember;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error create data: ' . $e->getMessage());
        }
        return $newMember->id;
    }

    /**
     * @return array
     */
    public function getDailyMemberOutOfDate()
    {
        $today = Carbon::now()->toDateString();
        $memberOutDate = DB::table('order_detail')
            ->join('order', 'order.id', '=', 'order_detail.order_id')
            ->join('club_book', 'order_detail.club_book_id', '=', 'club_book.id')
            ->join('book', 'club_book.book_id', '=', 'book.id')
            ->join('member', 'order.member_id', '=', 'member.id')
            ->whereDate('order.due_date', '<=', $today)
            ->whereIn('order_detail.order_status',
                [Order::ORDER_STATUS_CREATED, Order::ORDER_STATUS_OVER_DUA_DATE])
            ->select('member.email as member_email', 'book.name as book_name')
            ->get()
            ->groupBy('member_email');

        return $memberOutDate->map(function ($group) {
            $memberEmail = $group->first()->member_email;
            $bookList = $group->pluck('book_name')->toArray();

            return [
                'member_email' => $memberEmail,
                'list_book' => $bookList,
            ];
        })
        ->values()
        ->toArray();
    }

    public function updateOverDueOrder($memberMail)
    {
        $today = Carbon::now()->toDateString();
        $orderId = DB::table('order_detail')
            ->join('order', 'order.id', '=', 'order_detail.order_id')
            ->join('member', 'order.member_id', '=', 'member.id')
            ->whereIn('member.email', $memberMail)
            ->whereDate('order.due_date', '<=', $today)
            ->where('order_detail.order_status', '=', Order::ORDER_STATUS_CREATED)
            ->select('order.id')
            ->get();
        DB::table('order_detail')
            ->join('order', 'order.id', '=', 'order_detail.order_id')
            ->where('order_detail.order_status', '=', Order::ORDER_STATUS_OVER_DUA_DATE)
            ->update(['overdue_day_count' => DB::raw("DATEDIFF('$today', `order`.`due_date`)")]);
        $orderId = $orderId->pluck('id')->toArray();
        return DB::table('order_detail')
            ->where('order_detail.order_status', '=', Order::ORDER_STATUS_CREATED)
            ->whereIn('order_id', $orderId)
            ->update(['order_status' => Order::ORDER_STATUS_OVER_DUA_DATE]);
    }
}
