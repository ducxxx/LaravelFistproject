<?php
// app/Services/OrderService.php
namespace App\Services;

use App\Models\Book;
use App\Models\Member;
use App\Repositories\OrderRepository;
use App\Repositories\OrderDetailRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderService
{
    private $orderRepository;
    private $orderDetailRepository;

    public function __construct(OrderRepository $orderRepository, OrderDetailRepository $orderDetailRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->orderDetailRepository = $orderDetailRepository;
    }

    // Inside OrderService.php
    public function createOrder($request)
    {
        $member = DB::table('member')
            ->where('member.user_id', Auth::id())
            ->select('member.*')
            ->first();
        if ($member){
            $order = $this->orderRepository->create($request, $member);
            return $order;
        }else{
            $newMember = new Member();
            $newMember->user_id = Auth::id();
            $newMember->address = $request->input('address');
            $newMember->phone_number = $request->input('phone_number');
            $newMember->full_name = $request->input('full_name');
            $newMember->birth_date = optional(Auth::user()->birth_date)->format('Y-m-d');
            $newMember->email = Auth::user()->email;
            $newMember->save();
            $order = $this->orderRepository->create($request, $newMember);
            return $order;
        }
    }

    public function getClubBookName($clubBookId)
    {
        return $this->orderRepository->getClubBookName($clubBookId);
    }
    public function getOrderByUserId($userId)
    {
        return $this->orderRepository->getOrderByUserId($userId);
    }
}
