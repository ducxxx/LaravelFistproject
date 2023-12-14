<?php
// app/Services/OrderService.php
namespace App\Services;

use App\Repositories\OrderRepository;
use App\Repositories\OrderDetailRepository;

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
    public function createOrder(array $orderData, array $orderDetailsData)
    {
        $order = $this->orderRepository->create($orderData);

        foreach ($orderDetailsData as $orderDetailData) {
            $orderDetailData['order_id'] = $order->id;
            $this->orderDetailRepository->create($orderDetailData);
        }

        return $order;
    }

    public function getOrderByUserId($userId)
    {
        return $this->orderRepository->getOrderByUserId($userId);
    }
}
