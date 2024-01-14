<?php

namespace App\Repositories;

use App\Models\Club;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\DB;

class EmailRepository
{

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function updateOtpCode(string $code)
    {
        $user = User::where('id', auth()->id())->first();
        $user->otp_code = $code;
        $currentDateTime = new DateTime(); // Get the current date and time
        $currentDateTime->modify('+5 minutes'); // Add 5 minutes

        $newDateTime = $currentDateTime->format('Y-m-d H:i:s');
        $user->limit_time_verify = $newDateTime;
        $user->save();
        return $user;
    }

    public function getUser()
    {
        return User::where('id', auth()->id())->first();
    }
}
