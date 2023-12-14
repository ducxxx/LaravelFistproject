<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
    public function showChangePasswordForm()
    {
        return view('changePassword');
    }
    public function showLinkRequestForm()
    {
        return view('forgetPassword');
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
                if($afterLoginRedirectUrl){
                    return redirect()->to($afterLoginRedirectUrl);
                }
            }
            // If there's no intended URL, redirect to the default location
            return redirect(route('homepage'))->withInput();
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
    public function changePassword(Request $request)
    {
        $changePasswordRequest = new ChangePasswordRequest();
        $validator = $changePasswordRequest->validation($request);

        // Check if validation fails
        if ($validator->fails()) {
            return Redirect::route('show.change.password')->withErrors($validator->errors())->withInput();
        }

        // Get the authenticated user
        $user = auth()->user();

        // Check if the current password matches
        if (!Hash::check($request->current_password, $user->password)) {
//            return response()->json(['error' => 'Current password is incorrect'], 401);
            return redirect(route('show.change.password'))->withErrors($validator->errors())->withInput();
        }

        // Update the user's password
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect(route('user.login'))->with('message', 'Change password successfully')->withInput();
    }

}
