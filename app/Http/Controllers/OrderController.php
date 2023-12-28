<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    private $orderService;
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }
    public function showOrderList()
    {
        return view('includes-back.OrderList');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showOrderDialog(Request $request)
    {
        $clubBookId = $request->input('order');
        if ($clubBookId){
            $clubBookName = $this->orderService->getClubBookName($clubBookId);
            return view('pages.order.orderDialog', compact('clubBookName'));
        }
        return back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        $user = DB::table('users')
            ->where('id', Auth::id())
            ->select('users.*')
            ->first();
        $order = $this->orderService->createOrder($request,$user);
        if ($order==2){
            Session::flash('success', 'Create order success');
            return Redirect::route('order.get.list', ['user_id' => ($user->id)])->withInput();
        }
        if ($order==0){
            Session::flash('Error', 'You can borrow max 3 books');
            return Redirect::route('app')->with('error', 'You can borrow max 3 books')->withInput();
        }
        if($order==1){
            return Redirect::route('app')->with('error', 'Cannot borrow more book because you are borrowing 3 books')->withInput();
        }
        if ($order==3){
            return Redirect::route('app')->with('error', 'You can borrow max 3 books you borrowed')->withInput();
        }
        return back();
    }

    /**
     * @param $userId
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     */
    public function getOrderByUserId($userId){
        $orders = $this->orderService->getOrderByUserId($userId);
        if ($orders) {
            return view('pages.order.OrderList', compact('orders'));
        }
        $empty = "Don't have Order";
        return view('pages.EmptyPage',compact($empty))->with('status',404);
    }

}
