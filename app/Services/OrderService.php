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

    /**
     * @param $request
     * @return \App\Models\Order|\Illuminate\Http\RedirectResponse
     */
    public function createOrder($request,$user)
    {
        $member = DB::table('member')
            ->where('member.user_id', $user->id)
            ->select('member.*')
            ->first();
        if ($member){
            $order = $this->orderRepository->create($request, $member);
            return $order;
        }else{
            $newMember = new Member();
            $newMember->user_id = $user->id;
            $newMember->address = $request->input('address');
            $newMember->phone_number = $request->input('phone_number');
            $newMember->full_name = $request->input('full_name');
            $newMember->birth_date = optional($user->birth_date)->format('Y-m-d');
            $newMember->email = $user->email;
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

    public function getOrderList()
    {
        return $this->orderRepository->getOrderList();
    }

    public function orderConfirm(int $id)
    {
        return $this->orderRepository->orderConfirm($id);
    }

    public function orderReturn(int $id)
    {
        return $this->orderRepository->orderReturn($id);
    }
    public function orderOfflineCreate($request)
    {
        if ($request->input('newMember')){
            $newMember = new Member();
            $newMember->address = $request->input('address');
            $newMember->phone_number = $request->input('phone_number');
            $newMember->full_name = $request->input('full_name');
            $newMember->save();
            return $this->orderRepository->orderOfflineCreate($request, $newMember);
        }else{
            $member = DB::table('member')
                ->where('member.phone_number', $request->input('phone_number'))
                ->select('member.*')
                ->first();
            return $this->orderRepository->orderOfflineCreate($request, $member);
        }
    }

    public function getListBookCalendar()
    {
        return $this->orderRepository->getListBookCalendar();
    }
}
