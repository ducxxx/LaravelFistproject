<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Rules\ValidFullName;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function showRegisterForm()
    {
        return view('register');
    }
    public function register(Request $request)
    {
//        // Validate the request
        $userRequest = new UserRequest();
        $validator = $userRequest->validation($request);

        // Check if validation fails
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator->errors())->withInput();
        }

        // Create a new user
        $user = new User();
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phoneNumber');
        $user->full_name = $request->input('fullName');
        $user->password = bcrypt($request->input('password'));

        $user->save();

        return 'Registration successful!';
    }
}
