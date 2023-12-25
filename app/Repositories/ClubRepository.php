<?php

namespace App\Repositories;

use App\Models\Club;

class ClubRepository
{

    /**
     * @return Club[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllClubs()
    {
        return Club::all();
    }
}
