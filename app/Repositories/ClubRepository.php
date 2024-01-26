<?php

namespace App\Repositories;

use App\Models\Club;
use Illuminate\Support\Facades\DB;

class ClubRepository
{

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getAllClubs()
    {
        return DB::table('club')->get();
    }
}
