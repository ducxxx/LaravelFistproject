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
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @return View|Mixed
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function register(Request $request)
    {
        // Validate the request
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
        if ($user) {
            Session::flash('success', 'Register success');
            return redirect(route('login'))->withInput();
        } else {
            Session::flash('error', 'Register Error');
            return redirect(route('register'))->withInput();
        }
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function viewMyProfile()
    {
        return view('pages.user.MyProfile');
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $updateUserRequest = new UpdateUserRequest();
        $validator = $updateUserRequest->validation($request);
        if ($validator->fails()) {
            Session::flash('error', 'Update error');
            return Redirect::back()->withErrors($validator->errors())->withInput();
        }
        if ($request->file('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
            // Update the user's avatar path in the database (assuming you have a User model)
            auth()->user()->update(['avatar' => $path]);
        }
        $user = User::where('id', $id)->first();
        if ($user) {
            $user->email = $request->input('email');
            $user->phone_number = $request->input('phoneNumber');
            $user->full_name = $request->input('fullName');
            $user->birth_date = $request->input('birthDate');
            $user->address = $request->input('address');
            $user->save();
            Session::flash('success', 'Update success');
        }

        $member = Member::where('user_id', $id)->first();
        if ($member) {
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
