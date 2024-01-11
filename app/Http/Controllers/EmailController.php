<?php

namespace App\Http\Controllers;

use App\Services\EmailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class EmailController extends Controller
{

    protected $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }
    public function sendEmailWithCode()
    {
        // Generate a random 6-digit code
        $code = $this->emailService->generateRandomString();
        $save_code = $this->emailService->updateOtpCode($code);

        Mail::to(auth()->user()->email)->send(new \App\Mail\VerificationCodeMail($code));

        return response()->json(['message' => 'Email sent successfully.']);
    }

    public function verifyCode(string $code)
    {
        // Generate a random 6-digit code
        $save_code = $this->emailService->verifyCode($code);
        if ($save_code==0){
            $this->emailService->acticeUser();
            Session::flash('success', 'Verify successfully.');
//            // If there's no intended URL, redirect to the default location
//            return redirect(route('app'))->withInput();
            return response()->json(['message' => 'Verify successfully.']);
        }
        if ($save_code==1){
            return response()->json(['message' => 'Please send code again, code expired.']);
        }
        if ($save_code==2){
            return response()->json(['message' => 'Code incorrect, verify fail']);
        }


        return response()->json(['message' => 'Verify Error.']);
    }
}
