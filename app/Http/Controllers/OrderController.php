<?php

namespace App\Http\Controllers;

use App\Models\ClubBook;
use App\Models\Member;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
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

    /**
     * @return View|mixed
     */
    public function showOrderList()
    {
        return view('includes-back.OrderList');
    }

    /**
     * @param Request $request
     * @return View|RedirectResponse
     *
     */
    public function showOrderDialog(Request $request)
    {
        $clubBookId = $request->input('order');
        if ($clubBookId) {
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
        $user = $this->orderService->getUser();
        $dataCheck = $this->orderService->createOrder($request,$user);
        if ($dataCheck['isBorrow']==true){
            Session::flash('success', 'Create order success');
            return Redirect::route('order.get.list.control')->withInput();
        }else{
            $clubBookIds =$this->orderService->getClubBookId($request->clubBook);
            $clubBookName = $this->orderService->getClubBookName($clubBookIds);
            session(['errors' => $dataCheck['message']]);
            return view('pages.order.orderDialog', compact('clubBookName'));
        }
    }

    public function checkOrderOnline(Request $request)
    {
        $user = $this->orderService->getUser();
        $dataCheck = $this->orderService->checkOrderOnline($request,$user);
        if ($dataCheck['isBorrow']==false){
            Session::flash('error',$dataCheck['message']);
        }
        return $dataCheck;
    }

    /**
     * @param $userId
     * @return View|JsonResponse
     */
    public function getOrderByUserId($userId)
    {
        $orders = $this->orderService->getOrderByUserId($userId);
        if ($orders) {
            return view('pages.order.OrderList', compact('orders'));
        }
        $empty = "Don't have Order";
        return view('pages.EmptyPage', compact($empty))->with('status', 404);
    }

    /**
     * @return View|mixed
     */
    public function getOrderList()
    {
        $orders = $this->orderService->getOrderList();
        if ($orders) {
            return view('pages.order.OrderControlStaff', compact('orders'));
        }
        $empty = "Don't have Order";
        return view('pages.EmptyPage', compact($empty))->with('status', 404);
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function orderConfirm(int $id)
    {
        $orders = $this->orderService->orderConfirm($id);
        if ($orders) {
            return redirect(route('order.get.list.control'))->with("success", "Confirm Book success");
        } else {
            return redirect(route('order.get.list.control'))->with("error", "Confirm Book fail");
        }
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function orderReturn(int $id)
    {
        $orders = $this->orderService->orderReturn($id);
        if ($orders) {
            return redirect(route('order.get.list.control'))->with("success", "Return Book success");
        } else {
            return redirect(route('order.get.list.control'))->with("error", "Return Book fail");
        }
    }

    /**
     * @return View|Mixed
     *
     */
    public function orderOfflineDialog()
    {
        $members = Member::all();
        $clubBooks = ClubBook::all();
        return view('pages.order.orderOfflineDialog', compact('members', 'clubBooks'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function orderOfflineCreate(Request $request)
    {
        $dataCheck = $this->orderService->orderOfflineCreate($request);
        if ($dataCheck['isBorrow']==true){
            Session::flash('success', 'Create order success');
            return Redirect::route('order.get.list.control')->withInput();
        }else{
            return back();
        }
    }

    /**
     * @param Request $request
     * @return array
     */
    public function checkOrderOffline(Request $request){
        return $this->orderService->orderOfflineCreate($request);
    }

    /**
     * @return View|mixed
     */
    public function reportPage()
    {
        return view('pages.report.report');
    }

    /**
     * @return View|mixed
     */
    public function getBookCalendar()
    {
        $bookList = $this->orderService->getListBookCalendar()->toArray();
        return view('pages.book.BookBorrowCalendar', compact('bookList'));
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getListBookCalendar()
    {
        return $this->orderService->getListBookCalendar();
    }

    public function getDailyMemberOutOfDate()
    {
        $output = $this->orderService->getDailyMemberOutOfDate();
        return  $output;
    }

}
