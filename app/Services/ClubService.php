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

    public function getAllClubs()
    {
        return $this->clubRepository->getAllClubs();
    }
}
