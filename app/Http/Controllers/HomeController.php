<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
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
        return view('pages.home');
    }

    /**
     * @return View|mixed
     */
    public function showEmptyPage()
    {
        return view('pages.EmptyPage');
    }
}
