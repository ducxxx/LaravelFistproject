<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
    public function create($request,$member)
    {
        $bookOrders = json_decode($request->clubBook);
        $countOrders = DB::table('order')
            ->join('order_detail', 'order.id', '=', 'order_detail.order_id')
            ->join('member', 'order.member_id', '=', 'member.id')
            ->join('club_book', 'order_detail.club_book_id', '=', 'club_book.id')
            ->where('member.id', $member->id)
            ->where(function ($query) {
                $query->where('order_detail.order_status', 0)
                    ->orWhere('order_detail.order_status', 1)
                    ->orWhere('order_detail.order_status', 3);
            })
            ->select('order.*','order_detail.*')
            ->count();

        $booksBorrowing = DB::table('order')
            ->join('order_detail', 'order.id', '=', 'order_detail.order_id')
            ->join('member', 'order.member_id', '=', 'member.id')
            ->join('club_book', 'order_detail.club_book_id', '=', 'club_book.id')
            ->where('member.id', $member->id)
            ->where(function ($query) {
                $query->where('order_detail.order_status', 0)
                    ->orWhere('order_detail.order_status', 1);
            })
            ->select('order.*','order_detail.*')
            ->count();

        if (count($bookOrders)>3){
            return 0; //can borrow max 3 book
        }else{
            if($countOrders <3){
                if ((count($bookOrders)+$booksBorrowing)<=3) {
                    $newOrder = new Order();
                    $newOrder->member_id = $member->id;
                    $newOrder->club_id = $bookOrders[0]->club_id;
                    $newOrder->order_date = $request->input('order_date');
                    $newOrder->due_date = $request->input('due_date');
                    $newOrder->save();

                    $newOrderDetailList =[];
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
                }else{
                    return 3; //please return book
                }
            }else{
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
            ->select('order.*','order_detail.*','member.full_name as full_name','member.phone_number as phone_number', 'book.name as book_name')
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
            ->select('club_book.id','club_book.club_id as club_id','book.name as name')
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
            ->select('order.*','order_detail.*','member.full_name as full_name','member.phone_number as phone_number', 'book.name as book_name')
            ->paginate(10);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function orderConfirm(int $id)
    {
        $order_detail = OrderDetail::where('id',$id)->first();
        if ($order_detail){
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
        $order_detail = OrderDetail::where('id',$id)->first();
        if ($order_detail){
            $order_detail->order_status = 2;
            $order_detail->save();
        }
        return $order_detail;
    }

    public function orderOfflineCreate($request, $member)
    {
        $bookOrders = $request->input('club_book_ids');
        $countOrders = DB::table('order')
            ->join('order_detail', 'order.id', '=', 'order_detail.order_id')
            ->join('member', 'order.member_id', '=', 'member.id')
            ->join('club_book', 'order_detail.club_book_id', '=', 'club_book.id')
            ->where('member.id', $member->id)
            ->where(function ($query) {
                $query->where('order_detail.order_status', 0)
                    ->orWhere('order_detail.order_status', 1)
                    ->orWhere('order_detail.order_status', 3);
            })
            ->select('order.*','order_detail.*')
            ->count();

        $booksBorrowing = DB::table('order')
            ->join('order_detail', 'order.id', '=', 'order_detail.order_id')
            ->join('member', 'order.member_id', '=', 'member.id')
            ->join('club_book', 'order_detail.club_book_id', '=', 'club_book.id')
            ->where('member.id', $member->id)
            ->where(function ($query) {
                $query->where('order_detail.order_status', 0)
                    ->orWhere('order_detail.order_status', 1);
            })
            ->select('order.*','order_detail.*')
            ->count();

        if (count($bookOrders)>3){
            return Redirect::route('order.get.list.control')->with('error', 'You can borrow max 3 books')->withInput();
        }else{
            if($countOrders <3){
                if ((count($bookOrders)+$booksBorrowing)<=3) {
                    $newOrder = new Order();
                    $newOrder->member_id = $member->id;
                    $newOrder->club_id = $request->input('clubId');
                    $newOrder->order_date = $request->input('order_date');
                    $newOrder->due_date = $request->input('due_date');
                    $newOrder->save();

                    $newOrderDetailList =[];
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
                    Session::flash('success', 'Create order success');
                    return Redirect::route('order.get.list.control')->withInput();
                }else{
                    return Redirect::route('order.get.list.control')->with('error',
                        'You can borrow max 3 books you borrowed')->withInput();
                }
            }else{
                return Redirect::route('order.get.list.control')->with('error',
                    'Cannot borrow more book because you are borrowing 3 books')->withInput();
            }
        }
    }
}
