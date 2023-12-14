<?php

namespace App\Repositories;

use App\Models\Club;

class ClubRepository
{
    public function getAllClubs()
    {
        return Club::all();
    }
}
