<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\Member;
use App\Rules\ValidFullName;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function showRegisterForm()
    {

        return view('auth.register');
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

        return redirect(route('login'))->withInput();
    }
    public function viewMyProfile()
    {
        return view('pages.MyProfile');
    }
    public function update(Request $request, $id)
    {
        $updateUserRequest = new UpdateUserRequest();
        $validator = $updateUserRequest->validation($request);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator->errors())->withInput();
        }
        $user = User::where('id',$id)->first();
        if($user){
            $user->email = $request->input('email');
            $user->phone_number = $request->input('phoneNumber');
            $user->full_name = $request->input('fullName');
            $user->birth_date = $request->input('birthDate');
            $user->address = $request->input('address');
            $user->save();
        }

        $member = Member::where('user_id',$id)->first();
        if ($member){
            $member->email = $request->input('email');
            $member->phone_number = $request->input('phoneNumber');
            $member->full_name = $request->input('fullName');
            $member->birth_date = $request->input('birthDate');
            $member->address = $request->input('address');
            $member->save();
        }

        return redirect()->route('user.profile')->with('success', 'User updated successfully!');
    }
}
