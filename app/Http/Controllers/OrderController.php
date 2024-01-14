<?php

namespace App\Http\Controllers;

use App\Models\ClubBook;
use App\Models\Member;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
     *
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
            return Redirect::route('club.book', ['club_id' => session('club_id')])->with('error', 'You can borrow max 3 books')->withInput();
        }
        if($order==1){
            return Redirect::route('club.book', ['club_id' => session('club_id')])->with('error', 'Cannot borrow more book because you are borrowing 3 books')->withInput();
        }
        if ($order==3){
            return Redirect::route('club.book', ['club_id' => session('club_id')])->with('error', 'You can borrow max 3 books you borrowed')->withInput();
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

    public function getOrderList(){
        $orders = $this->orderService->getOrderList();
        if ($orders) {
            return view('pages.order.OrderControlStaff', compact('orders'));
        }
        $empty = "Don't have Order";
        return view('pages.EmptyPage',compact($empty))->with('status',404);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function orderConfirm(int $id){
        $orders = $this->orderService->orderConfirm( $id);
        if ($orders) {
            return redirect(route('order.get.list.control'))->with("success","Confirm Book success");
        }else{
            return redirect(route('order.get.list.control'))->with("error","Confirm Book fail");
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function orderReturn(int $id){
        $orders = $this->orderService->orderReturn( $id);
        if ($orders) {
            return redirect(route('order.get.list.control'))->with("success","Return Book success");
        }else{
            return redirect(route('order.get.list.control'))->with("error","Return Book fail");
        }
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
     */
    public function orderOfflineDialog(){
        $members = Member::all();
        $clubBooks = ClubBook::all();
        return view('pages.order.orderOfflineDialog', compact('members','clubBooks'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function orderOfflineCreate(Request $request){
        return $this->orderService->orderOfflineCreate($request);
    }

    public function reportPage(){
//        dd(Auth::id());
        return view('pages.report.report');
    }

    public function getBookCalendar(){
        $bookList = $this->orderService->getListBookCalendar()->toArray();
        //.$bookList = response()->json($bookList);
//        dd($bookList);
        return view('pages.book.BookBorrowCalendar', compact('bookList'));
    }

    public function getListBookCalendar(){
        $bookList = $this->orderService->getListBookCalendar();
        return $bookList;
    }

}
