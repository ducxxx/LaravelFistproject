<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function showLoginForm()
    {
        return view('login');
    }
    public function showLogoutForm()
    {
        return view('logout');
    }

    public function login(Request $request)
    {
        $loginRequest = new AuthRequest();
        $validator = $loginRequest->validation($request);

        // Check if validation fails
        if ($validator->fails()) {
            return Redirect::route('login')->withErrors($validator->errors())->withInput();
        }

        $user = $this->userService->login($request['username'], $request['password']);

        if ($user) {
            // Authentication successful
            // You can customize the response as needed
            return redirect(route('homepage'))->with('success', 'Login successful');
        } else {
            // Authentication failed
            // You can customize the response as needed
            return redirect(route('user.login'))->with('error', 'Username or password incorrect')->withInput();
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return Redirect::route('login');
    }
}
