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
     * @param $club_id
     * @return mixed
     */
    public function getClubBooksByClubId($clubId)
    {
        return $this->clubBookRepository->getClubBooksByClubId($clubId);
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
     * @return mixed
     */
    public function searchClubBooksByName($clubId, $bookName)
    {
        return $this->clubBookRepository->searchClubBooksByName($clubId,$bookName);
    }

    /**
     * @return mixed
     */
    public function getListBook()
    {
        return $this->clubBookRepository->getListBook();
    }

    /**
     * @param $id
     * @return object|null
     */
    public function getClubBookDetail($id)
    {
        return $this->clubBookRepository->getClubBookDetail($id);
    }

    /**
     * @param $id
     * @param $request
     * @return object|null
     */
    public function updateClubBookDetail($id , $bookUpdate)
    {
        return $this->clubBookRepository->updateClubBookDetail($id, $bookUpdate);
    }

    public function addNewBook($newBook)
    {
        return $this->clubBookRepository->addNewBook($newBook);
    }

    public function getClubBookByClubId($clubId)
    {
        return $this->clubBookRepository->getClubBookByClubId($clubId);
    }
}
