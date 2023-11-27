<?php

namespace App\Http\Controllers;

use App\Rules\ValidFullName;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {
//       dd($request->all());
//       dd($request->input('phoneNumber'));

//
//         Validate the request
//        $request->validate([
//            'username' => 'required|unique:users',
//            'fullName' => 'required',
//            'email' => 'required|email|unique:users',
//            'phoneNumber' => 'required',
//            'password' => 'required|confirmed',
//        ]);
// Validation rules
        $rules = [
            'username' => 'required|unique:users',
            'fullName' => ['required', 'valid_full_name'],
            'email' => 'required|email|unique:users',
            'phoneNumber' => 'required',
            'password' => 'required',
        ];
        $messages = [
            'fullName.valid_full_name' => 'The full name field is not contain special characters.',
        ];
        // Validation messages

        // Validate the request
        $validator = Validator::make($request->all(), $rules, $messages);

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
