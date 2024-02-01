<?php

namespace App\Services;

use App\Models\Book;
use App\Repositories\ClubBookRepository;

class ClubBookService
{
    private $clubBookRepository;

    public function __construct(ClubBookRepository $clubBookRepository)
    {
        $this->clubBookRepository = $clubBookRepository;
    }

    /**
     * @param $clubId
     * @return mixed
     */
    public function getClubBooksByClubId($clubId)
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

    public function getListBook()
    {
        return $this->clubBookRepository->getListBook();
    }

    public function getClubBookDetail($id)
    {
        return $this->clubBookRepository->getClubBookDetail($id);
    }

    public function updateClubBookDetail($id , $request)
    {
        return $this->clubBookRepository->updateClubBookDetail($id, $request);
    }

    public function addNewBook($request)
    {
        return $this->clubBookRepository->addNewBook($request);
    }

    public function getClubBookByClubId($club_id)
    {
        return $this->clubBookRepository->getClubBookByClubId($clubId);
    }
}
