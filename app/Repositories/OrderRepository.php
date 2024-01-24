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
    /**
     * @param $request
     * @param $member
     * @return Order|\Illuminate\Http\RedirectResponse
     */
    public function create($request, $memberId)
    {
        $bookOrders = json_decode($request->clubBook);
        $countOrders = DB::table('order')
            ->join('order_detail', 'order.id', '=', 'order_detail.order_id')
            ->join('member', 'order.member_id', '=', 'member.id')
            ->join('club_book', 'order_detail.club_book_id', '=', 'club_book.id')
            ->where('member.id',$memberId)
            ->where(function ($query) {
                $query->where('order_detail.order_status', 0)
                    ->orWhere('order_detail.order_status', 1)
                    ->orWhere('order_detail.order_status', 3);
            })
            ->select('order.*', 'order_detail.*')
            ->count();

        $booksBorrowing = DB::table('order')
            ->join('order_detail', 'order.id', '=', 'order_detail.order_id')
            ->join('member', 'order.member_id', '=', 'member.id')
            ->join('club_book', 'order_detail.club_book_id', '=', 'club_book.id')
            ->where('member.id', $memberId)
            ->where(function ($query) {
                $query->where('order_detail.order_status', 0)
                    ->orWhere('order_detail.order_status', 1);
            })
            ->select('order.*', 'order_detail.*')
            ->count();

        if (count($bookOrders) > 3) {
            return 0; //can borrow max 3 book
        } else {
            if ($countOrders < 3) {
                if ((count($bookOrders) + $booksBorrowing) <= 3) {
                    $newOrder = new Order();
                    $newOrder->member_id = $memberId;
                    $newOrder->club_id = $bookOrders[0]->club_id;
                    $newOrder->order_date = $request->input('order_date');
                    $newOrder->due_date = $request->input('due_date');
                    $newOrder->save();

                    $newOrderDetailList = [];
                    foreach ($bookOrders as $bookOrder) {
                        $newOrderDetail = [
                            'order_id' => $newOrder->id,
                            'club_book_id' => $bookOrder->id,
                            'return_date' => null,
                            'overdue_day_count' => 0,
                            'order_status' => 0,
                            'note' => $request->input('note'),
                        ];
                        $newOrderDetailList[] = $newOrderDetail;
                    }
                    OrderDetail::insert($newOrderDetailList);
                    return 2; //borrow success
                } else {
                    return 3; //please return book
                }
            } else {
                return 1; //you borrowed 3 book please return books
            }
        }
    }

    /**
     * @param $userId
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getOrderByUserId($userId)
    {
        return DB::table('order')
            ->join('order_detail', 'order.id', '=', 'order_detail.order_id')
            ->join('member', 'order.member_id', '=', 'member.id')
            ->join('club_book', 'order_detail.club_book_id', '=', 'club_book.id')
            ->join('book', 'club_book.id', '=', 'book.id')
            ->where('member.user_id', $userId)
            ->select('order.*', 'order_detail.*', 'member.full_name as full_name',
                'member.phone_number as phone_number', 'book.name as book_name')
            ->paginate(10);
    }

    /**
     * @param $clubBookId
     * @return \Illuminate\Support\Collection
     */
    public function getClubBookName($clubBookId)
    {
        return DB::table('club_book')
            ->join('book', 'club_book.book_id', '=', 'book.id')
            ->whereIn('club_book.id', $clubBookId)
            ->select('club_book.id', 'club_book.club_id as club_id', 'book.name as name')
            ->get();
    }


    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getOrderList()
    {
        return DB::table('order')
            ->join('order_detail', 'order.id', '=', 'order_detail.order_id')
            ->join('member', 'order.member_id', '=', 'member.id')
            ->join('club_book', 'order_detail.club_book_id', '=', 'club_book.id')
            ->join('book', 'club_book.id', '=', 'book.id')
            ->select('order.*', 'order_detail.*', 'member.full_name as full_name',
                'member.phone_number as phone_number', 'book.name as book_name')
            ->paginate(10);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function orderConfirm(int $id)
    {
        $order_detail = OrderDetail::where('id', $id)->first();
        if ($order_detail) {
            $order_detail->order_status = 1;
            $order_detail->save();
        }
        return $order_detail;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function orderReturn(int $id)
    {
        $order_detail = OrderDetail::where('id', $id)->first();
        $return_day = date('Y-m-d');
        if ($order_detail) {
            $order_detail->order_status = 2;
            $order_detail->return_date = $return_day;
            $order_detail->save();
        }
        return $order_detail;
    }

    public function getUser()
    {
        return DB::table('users')
            ->where('id', Auth::id())
            ->select('users.*')
            ->first();
    }

    public function orderOfflineCreate($request, $member)
    {
        $bookOrders = $request->input('club_book_ids');
        try {
            $newOrder = new Order();
            $newOrder->member_id = $member;
            $newOrder->club_id = $request->input('clubId');
            $newOrder->order_date = $request->input('order_date');
            $newOrder->due_date = $request->input('due_date');
            $newOrder->save();

            $newOrderDetailList = [];
            foreach ($bookOrders as $bookOrder) {
                $newOrderDetail = [
                    'order_id' => $newOrder->id,
                    'club_book_id' => $bookOrder,
                    'return_date' => null,
                    'overdue_day_count' => 0,
                    'order_status' => 1,
                    'note' => $request->input('note'),
                ];
                $newOrderDetailList[] = $newOrderDetail;
            }
            OrderDetail::insert($newOrderDetailList);
        }catch (\Exception $e){
            DB::rollBack();
            // Log the error
            Log::error('Error updating data: ' . $e->getMessage());
        }
    }

    public function orderOnlineCreate($request, $member)
    {
        $bookOrders = json_decode($request->clubBook);
        try {
            $newOrder = new Order();
            $newOrder->member_id = $member;
            $newOrder->club_id = $bookOrders[0]->club_id;
            $newOrder->order_date = $request->input('order_date');
            $newOrder->due_date = $request->input('due_date');
            $newOrder->save();

            $newOrderDetailList = [];
            foreach ($bookOrders as $bookOrder) {
                $newOrderDetail = [
                    'order_id' => $newOrder->id,
                    'club_book_id' => $bookOrder->id,
                    'return_date' => null,
                    'overdue_day_count' => 0,
                    'order_status' => 0,
                    'note' => $request->input('note'),
                ];
                $newOrderDetailList[] = $newOrderDetail;
            }
            OrderDetail::insert($newOrderDetailList);
        }catch (\Exception $e){
            DB::rollBack();
            // Log the error
            Log::error('Error updating data: ' . $e->getMessage());
        }
    }

    public function currentCountBook(int $club_book_id){
        return  DB::table('club_book')
            ->join('book', 'book.id', '=', 'club_book.book_id')
            ->where('club_book.id', $club_book_id)
            ->select('club_book.current_count as current_count', 'book.name as book_name')->first();
    }

    public function countBookBorrowing(int $memberId){
        return DB::table('order')
            ->join('order_detail', 'order.id', '=', 'order_detail.order_id')
            ->join('member', 'order.member_id', '=', 'member.id')
            ->join('club_book', 'order_detail.club_book_id', '=', 'club_book.id')
            ->where('member.id', $memberId)
            ->where(function ($query) {
                $query->where('order_detail.order_status', 0)
                    ->orWhere('order_detail.order_status', 1)
                    ->orWhere('order_detail.order_status', 3);
            })
            ->select('order.id', 'order_detail.id')
            ->count();
    }

    public function checkNewMember(string $phone_number){
        return DB::table('member')
            ->where('member.phone_number', $phone_number)
            ->select('member.id as id')->first();
    }

    public function createNewMember($request){
        $newMember = new Member();
        try {
            $newMember->address = $request->input('address');
            $newMember->phone_number = $request->input('phone_number');
            $newMember->full_name = $request->input('full_name');
            $newMember->save();
        }catch (\Exception $e){
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
        $bookList = DB::table('order_detail')
            ->join('order', 'order.id', '=', 'order_detail.order_id')
            ->join('member', 'order.member_id', '=', 'member.id')
            ->join('club_book', 'order_detail.club_book_id', '=', 'club_book.id')
            ->join('book', 'club_book.book_id', '=', 'book.id')
            ->join('club', 'order.club_id', '=', 'club.id')
            ->select('book.name as title', 'order.order_date as start', 'order.due_date as due_date',
                'order_detail.return_date as end', 'club.name as from_club', 'member.full_name as borrower',
                'order_detail.order_status as order_status')
            ->get();
        return $bookList;
    }

    public function checkUserMember($userId){
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
    public function createNewMemberForOrderOnline($request, $user){
        $newMember = new Member();
        try {
            $newMember->user_id = $user->id;
            $newMember->address = $request->input('address');
            $newMember->phone_number = $request->input('phone_number');
            $newMember->full_name = $request->input('full_name');
            $newMember->birth_date = optional($user->birth_date)->format('Y-m-d');
            $newMember->email = $user->email;
            $newMember->save();
            return $newMember;
        }catch (\Exception $e){
            DB::rollBack();
            // Log the error
            Log::error('Error updating data: ' . $e->getMessage());
        }
        return $newMember->id;
    }

    public function getDailyMemberOutOfDate(){
        $today = Carbon::now()->toDateString();
        $memberOutDate = DB::table('order_detail')
            ->join('order', 'order.id', '=', 'order_detail.order_id')
            ->join('member', 'order.member_id', '=', 'member.id')
            ->join('club_book', 'order_detail.club_book_id', '=', 'club_book.id')
            ->join('book', 'club_book.book_id', '=', 'book.id')
            ->join('club', 'order.club_id', '=', 'club.id')
            ->whereDate('order.due_date','<=',$today)
            ->whereIn('order_detail.order_status',[1,3])
            ->select('member.id as member_id', 'member.email as member_email', 'order.id as order_id'
                ,'order.due_date as due_date', 'book.name as book_name', 'order_detail.order_status')
            ->get();
        return $memberOutDate;
    }

    public function updateOverDueOrder($orderId){
        DB::table('order_detail')
            ->whereIn('order_id', $orderId)
            ->update(['order_status' => 3]);
    }
}
