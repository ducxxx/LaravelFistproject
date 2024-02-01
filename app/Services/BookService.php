<?php

namespace App\Services;

use App\Repositories\BookRepository;

class BookService
{
    private $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    /**
     * @return mixed
     */
    public function getAllBook()
    {
        return $this->bookRepository->getAllBook();
    }

    /**
     * @param $bookName
     * @return mixed
     */
    public function searchBooksByName($bookName)
    {
        return $this->bookRepository->searchBooksByName($bookName);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function bookDetail(int $id)
    {
        return $this->bookRepository->bookDetail($id);
    }
}
