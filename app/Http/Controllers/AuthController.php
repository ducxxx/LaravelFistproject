<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = $this->userService->login($credentials['username'], $credentials['password']);

        if ($user) {
            // Authentication successful
            // You can customize the response as needed
            return response()->json(['message' => 'Login successful']);
        } else {
            // Authentication failed
            // You can customize the response as needed
            return redirect('/login')->with('error', 'Username or password incorrect')->withInput();
        }
    }
}
