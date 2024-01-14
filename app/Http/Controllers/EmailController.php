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
}
