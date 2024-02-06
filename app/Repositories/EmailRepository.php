<?php

namespace App\Repositories;

use App\Models\Club;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\DB;

class EmailRepository
{

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function updateOtpCode(string $code, $userID)
    {
        $user = User::where('id', $userID)->first();
        $user->otp_code = $code;
        $currentDateTime = new DateTime(); // Get the current date and time
        $currentDateTime->modify('+5 minutes'); // Add 5 minutes

        $newDateTime = $currentDateTime->format('Y-m-d H:i:s');
        $user->limit_time_verify = $newDateTime;
        $user->save();
        return $user;
    }

    /**
     * @return mixed
     */
    public function getUser($userId)
    {
        return User::where('id',$userId)->first();
    }

    /**
     * @param string $email
     * @return mixed
     */
    public function getUserByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }

    /**
     * @param $code
     * @param $user
     * @return mixed
     */
    public function updatePassword($code, $user)
    {
        $user->forget_password_code = $code;
        $currentDateTime = new DateTime(); // Get the current date and time
        $currentDateTime->modify('+5 minutes'); // Add 5 minutes

        $newDateTime = $currentDateTime->format('Y-m-d H:i:s');
        $user->limit_time_forget_password = $newDateTime;
        $user->save();
        return $user;
    }
}
