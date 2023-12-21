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

    public function getAllBook()
    {
        return $this->bookRepository->getAllBook();
    }
    public function searchBooksByName($bookName)
    {
        return $this->bookRepository->searchBooksByName($bookName);
    }

    public function bookDetail(int $id)
    {
        return $this->bookRepository->bookDetail($id);
    }
}
