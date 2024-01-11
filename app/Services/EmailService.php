<?php

namespace App\Services;

use App\Repositories\EmailRepository;
use DateTime;
use Illuminate\Support\Facades\Auth;

class EmailService
{
    private $emailRepository;

    public function __construct(EmailRepository $emailRepository)
    {
        $this->emailRepository = $emailRepository;
    }

    function generateRandomString() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < 8; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }
    public function updateOtpCode(string $code)
    {
        return $this->emailRepository->updateOtpCode($code);
    }

    public function verifyCode(string $code)
    {
        $user = $this->emailRepository->getUser();
        if ($user->otp_code == $code){
            $currentDateTime = new DateTime(); // Get the current date and time
            $currentDateTime = $currentDateTime->format('Y-m-d H:i:s');
            if ($currentDateTime <= $user->limit_time_verify){
                return 0; //success
            }else{
                return 1; //het thoi gian nhap code
            }
        }else{
            return 2; //sai code
        }
    }
    public function acticeUser()
    {
        $user = $this->emailRepository->getUser();
        $user->is_active =1;
        $user->save();
    }
}
