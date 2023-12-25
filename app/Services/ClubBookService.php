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

    /**
     * @param $club_id
     * @return \Illuminate\Support\Collection
     */
    public function getClubBooksByClubId($club_id)
    {
        return $this->clubBookRepository->getClubBooksByClubId($club_id);
    }

    /**
     * @return mixed
     */
    public function getClubBooksAll()
    {
        return $this->clubBookRepository->getClubBooksAll();
    }

    /**
     * @param $clubId
     * @param $bookName
     * @return \Illuminate\Support\Collection
     */
    public function searchClubBooksByName($clubId, $bookName)
    {
        return $this->clubBookRepository->searchClubBooksByName($clubId,$bookName);
    }
}
