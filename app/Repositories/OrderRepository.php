<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderRepository
{
    public function create($request,$member)
    {
        $bookOrders = json_decode($request->clubBook);

        $newOrder = new Order();
        $newOrder->member_id = $member->id;
        $newOrder->club_id = $bookOrders[0]->club_id;
        $newOrder->order_date = $request->input('order_date');
        $newOrder->due_date = $request->input('due_date');
        $newOrder->save();

        foreach ($bookOrders as $bookOrder){
            $newOrderDetail = new OrderDetail();
            $newOrderDetail->order_id = $newOrder->id;
            $newOrderDetail->club_book_id = $bookOrder->id;
            $newOrderDetail->return_date = null;
            $newOrderDetail->overdue_day_count = 0;
            $newOrderDetail->order_status = 0;
            $newOrderDetail->note = $request->input('note');
            $newOrderDetail->save();
        }

        return $newOrder;
    }
    public function getOrderByUserId($userId)
    {
        $orders = DB::table('order')
            ->join('order_detail', 'order.id', '=', 'order_detail.order_id')
            ->join('member', 'order.member_id', '=', 'member.id')
            ->join('club_book', 'order_detail.club_book_id', '=', 'club_book.id')
            ->join('book', 'club_book.id', '=', 'book.id')
            ->where('member.user_id', $userId)
            ->select('order.*','order_detail.*','member.full_name as full_name','member.phone_number as phone_number', 'book.name as book_name')
            ->get();
        return $orders;
    }

    public function getClubBookName($clubBookId)
    {
        $clubBookName = DB::table('club_book')
            ->join('book', 'club_book.book_id', '=', 'book.id')
            ->whereIn('club_book.id', $clubBookId)
            ->select('club_book.id','club_book.club_id as club_id','book.name as name')
            ->get();
        return $clubBookName;
    }
}
