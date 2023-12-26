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
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllBook()
    {
        return $this->bookRepository->getAllBook();
    }

    /**
     * @param $bookName
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function searchBooksByName($bookName)
    {
        return $this->bookRepository->searchBooksByName($bookName);
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function bookDetail(int $id)
    {
        return $this->bookRepository->bookDetail($id);
    }
}
