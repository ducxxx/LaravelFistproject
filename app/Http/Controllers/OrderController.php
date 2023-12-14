<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    private $orderService;
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }
    public function showOrderList()
    {
        return view('includes.OrderList');
    }
    public function showOrderDialog()
    {
        return view('includes.orderDialog');
    }

    public function create(Request $request)
    {
        // Validate request data as needed

        $orderData = $request->input('order');
        $orderDetailData = $request->input('order_detail');
        $order = $this->orderService->createOrder($orderData, $orderDetailData);

        // You can return a response or redirect as needed
        return response()->json($order, 201);
    }
    public function getOrderByUserId($userId){
        $orders = $this->orderService->getOrderByUserId($userId);
        if ($orders) {
            return view('includes.OrderList', compact('orders'));
        }

        return response()->json(['error' => 'Dont Have Order'], 404);
//        return $orders;
    }

}
