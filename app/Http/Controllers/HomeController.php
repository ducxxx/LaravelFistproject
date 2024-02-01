<?php

namespace App\Http\Controllers;

use App\Services\BookService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    protected $bookService;
    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }
    /**
     * @return View|mixed
     */
    public function showHomePage()
    {
        return view('home');
    }

    /**
     * @return View|mixed
     */
    public function showAppPage()
    {
        $bookList = $this->bookService->getAllBook();
//        dd($bookList[0]->name);
        return view('pages.home' , compact('bookList'));
    }

    /**
     * @return View|mixed
     */
    public function showEmptyPage()
    {
        return view('pages.EmptyPage');
    }
}
