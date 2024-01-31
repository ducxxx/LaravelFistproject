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

        // TODO: dùng hàm random 8 kí tự chứ không dùng vòng for
        for ($i = 0; $i < 8; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }

    /**
     * @param string $code
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function updateOtpCode(string $code)
    {
        return $this->emailRepository->updateOtpCode($code);
    }

    public function verifyCode(string $code)
    {
        $user = $this->emailRepository->getUser();
        if ($user->otp_code == $code){
            // TODO: xử dụng hàm thời gian Carbon::now()->format('Y-m-d H:i:s')
            $currentDateTime = new DateTime(); // Get the current date and time
            $currentDateTime = $currentDateTime->format('Y-m-d H:i:s');
            if ($currentDateTime <= $user->limit_time_verify){
                // TODO: chuyển các phần hardcode sang const
                return 0; //success
            }else{
                // TODO: chuyển các phần hardcode sang const
                return 1; //het thoi gian nhap code
            }
        }else{
            // TODO: chuyển các phần hardcode sang const
            return 2; //sai code
        }
    }
    public function acticeUser()
    {
        $user = $this->emailRepository->getUser();
        // TODO: chuyển các phần hardcode sang const
        $user->is_active =1;
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
            // TODO: xử dụng hàm thời gian Carbon::now()->format('Y-m-d H:i:s')
            $currentDateTime = new DateTime(); // Get the current date and time
            $currentDateTime = $currentDateTime->format('Y-m-d H:i:s');
            if ($currentDateTime <= $user->limit_time_forget_password){
                // TODO: chuyển các phần hardcode sang const
                return 0; //success
            }else{
                // TODO: chuyển các phần hardcode sang const
                return 1; //het thoi gian nhap code
            }
        }else{
            // TODO: chuyển các phần hardcode sang const
            return 2; //sai code
        }
    }
    public function changePassword($email, $password)
    {
        $user = $this->emailRepository->getUserByEmail($email);
        $user->password =bcrypt($password);
        $user->save();
    }
}
