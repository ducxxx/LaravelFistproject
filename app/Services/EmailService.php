<?php

namespace App\Services;

use App\Models\User;
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
        $shuffledString = str_shuffle($characters);
        $randomString = substr($shuffledString, 0, 8);

        return $randomString;
    }

    /**
     * @param string $code
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function updateOtpCode(string $code, $userId)
    {
        return $this->emailRepository->updateOtpCode($code, $userId);
    }

    public function verifyCode(string $code, $userId)
    {
        $user = $this->emailRepository->getUser($userId);
        if ($user->otp_code == $code){
            $currentDateTime = new DateTime(); // Get the current date and time
            $currentDateTime = $currentDateTime->format('Y-m-d H:i:s');
            if ($currentDateTime <= $user->limit_time_verify){
                return User::VERIFY_SUCCESS; //success
            }else{
                return User::VERIFY_EXPIRED_CODE; //het thoi gian nhap code
            }
        }else{
            return User::VERIFY_WRONG_CODE; //sai code
        }
    }
    public function acticeUser($userId)
    {
        $user = $this->emailRepository->getUser($userId);
        $user->is_active =User::ACTIVE;
        $user->save();
    }

    public function getUserByEmail(string $email)
    {
        return $this->emailRepository->getUserByEmail($email);
    }
    public function updatePassword($code, $user)
    {
        return $this->emailRepository->updatePassword($code, $user);
    }

    public function changeNewPassword(string $email, string $code)
    {
        $user = $this->emailRepository->getUserByEmail($email);
        if ($user->forget_password_code == $code){
            $currentDateTime = new DateTime(); // Get the current date and time
            $currentDateTime = $currentDateTime->format('Y-m-d H:i:s');
            if ($currentDateTime <= $user->limit_time_forget_password){
                return User::VERIFY_SUCCESS;
            }else{
                return User::VERIFY_EXPIRED_CODE;
            }
        }else{
            return User::VERIFY_WRONG_CODE;
        }
    }
    public function changePassword($email, $password)
    {
        $user = $this->emailRepository->getUserByEmail($email);
        $user->password =bcrypt($password);
        $user->save();
    }
}
