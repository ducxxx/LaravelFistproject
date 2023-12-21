<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

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
    public function showOrderDialog(Request $request)
    {
        $clubBookId = $request->input('order');
        if ($clubBookId){
            $clubBookName = $this->orderService->getClubBookName($clubBookId);
            return view('pages.orderDialog', compact('clubBookName'));
        }
        return back();
    }

    public function create(Request $request)
    {
        // Validate request data as needed
        $order = $this->orderService->createOrder($request);

        // You can return a response or redirect as needed
        return Redirect::route('app')->withInput();
    }
    public function getOrderByUserId($userId){
        $orders = $this->orderService->getOrderByUserId($userId);
        if ($orders) {
            return view('pages.OrderList', compact('orders'));
        }

        return response()->json(['error' => 'Dont Have Order'], 404);
//        return $orders;
    }

}
