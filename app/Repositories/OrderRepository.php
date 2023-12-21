<?php

namespace App\Repositories;

use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderRepository
{
    public function create($data,$member)
    {
        dd($member);
        return Order::create($data);
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
            ->select('club_book.id','book.name as name')
            ->get();
        return $clubBookName;
    }
}
