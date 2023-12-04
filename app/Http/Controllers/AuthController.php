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
            if (session()->has('url.after_login_redirect')) {
                // Get the intended URL and clear it from the session
                $afterLoginRedirectUrl = session('url.after_login_redirect');
                session()->forget('url.after_login_redirect');

                // Redirect the user to the intended URL
                return redirect()->to($afterLoginRedirectUrl);
            }

            // If there's no intended URL, redirect to the default location
            return redirect()->intended($this->redirectPath());
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
