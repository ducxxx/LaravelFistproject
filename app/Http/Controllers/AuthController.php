<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            return 'Login successful!';
//            return redirect()->intended('/dashboard'); // Redirect to the intended URL or any default URL
        }

        // Authentication failed
        return back()->withErrors(['username' => 'Invalid username or password'])->withInput();
    }
}
