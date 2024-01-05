<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function showHomePage()
    {
        return view('home');
    }
    public function showAppPage()
    {
        return view('pages.home');
    }

    public function showEmptyPage()
    {
        return view('pages.EmptyPage');
    }
}
