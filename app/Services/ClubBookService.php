<?php

namespace App\Services;

use App\Repositories\ClubBookRepository;

class ClubBookService
{
    private $clubBookRepository;

    public function __construct(ClubBookRepository $clubBookRepository)
    {
        $this->clubBookRepository = $clubBookRepository;
    }

    public function getClubBooksByClubId($club_id)
    {
        return $this->clubBookRepository->getClubBooksByClubId($club_id);
    }
    public function getClubBooksAll()
    {
        return $this->clubBookRepository->getClubBooksAll();
    }
}
