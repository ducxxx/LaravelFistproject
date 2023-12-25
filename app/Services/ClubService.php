<?php

namespace App\Services;

use App\Repositories\ClubRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class ClubService
{
    private $clubRepository;

    public function __construct(ClubRepository $clubRepository)
    {
        $this->clubRepository = $clubRepository;
    }

    /**
     * @return \App\Models\Club[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllClubs()
    {
        return $this->clubRepository->getAllClubs();
    }
}
