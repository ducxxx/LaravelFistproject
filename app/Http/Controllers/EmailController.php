<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckCodeRequest;
use App\Http\Requests\CheckExistEmailRequest;
use App\Models\User;
use App\Services\EmailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class EmailController extends Controller
{
    protected $emailService;
    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendEmailWithCode()
    {
        // Generate a random 6-digit code
        $code = $this->emailService->generateRandomString();
        // update code DB
        $this->emailService->updateOtpCode($code);
        // send email code verify
        Mail::to(auth()->user()->email)->send(new \App\Mail\VerificationCodeMail($code));

        return response()->json(['message' => 'Email sent successfully.']);
    }

    /**
     * verify code
     * @param string $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function verifyCode(string $code)
    {
        // Generate a random 6-digit code
        $save_code = $this->emailService->verifyCode($code);
        $message = '';
        if ($save_code == 0) {
            $this->emailService->acticeUser();
            Session::flash('success', 'Verify successfully.');
            $message = 'Verify successfully.';
        } else if ($save_code == 1) {
            $message = 'Please send code again, code expired.';
        } else if ($save_code == 2) {
            $message = 'Code incorrect, verify fail';
        } else {
            $message = 'Verify Error.';
        }

        return response()->json(['message' => $message]);
    }

    public function sendEmailForgetPasswordWithCode(Request $request)
    {
        $code = $this->emailService->generateRandomString();
        // update code DB
        $emailRequest = new CheckExistEmailRequest();
        $validator = $emailRequest->validation($request);

        // Check if validation fails
        if ($validator->fails()) {
            return Redirect::route('password.request')->withErrors($validator->errors())->withInput();
        }
        $user = $this->emailService->getUserByEmail($request->input('email'));
        if ($user){
            $this->emailService->updatePassword($code, $user);
            Mail::to($request->input('email'))->send(new \App\Mail\ForgetPassword($code));
            Session::flash('success', 'Email exist please check email to input code and update password');
            $email =$request->input('email');
            return view('auth.confirmFormgetPassword', compact('email'));
        }else{
            Session::flash('false', 'Email does not exist');
            return view('auth.forgetPassword', ['message' => 'Email does not exist']);
        }
    }

    public function changeNewPassword(string $email , Request $request)
    {
        // Generate a random 6-digit code
        $save_code = $this->emailService->changeNewPassword($email, $request->input('code'));
        $message = '';
        if ($save_code == 0) {
            $this->emailService->changePassword($email, $request->input('password'));
            Session::flash('success', 'Change password successfully.');
            return redirect(route('login'));
        } else if ($save_code == 1) {
            Session::flash('error', 'Please send code again, code expired');
            return view('auth.forgetPassword');
        } else if ($save_code == 2) {
            Session::flash('error', 'Code incorrect');
//            back();
            return view('auth.confirmFormgetPassword', compact('email'));
        } else {
            $message = 'Change Password Error.';
            Session::flash('error', 'change password fail');
            return back()->withErrors($message);
        }
    }
}
