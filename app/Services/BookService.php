<?php

namespace App\Services;

use App\Models\Book;
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

    public function topBorrowingBooks(string $year_month)
    {
        // Get list of orders borrowing books in the specified month
        $top_books = $this->bookRepository->topBorrowingBooks($year_month);

        if ($top_books->isEmpty()) {
            return ['status_code' => '200','message' => 'Successfully', 'data' => []];
        }
        return ['status_code' => '200','message' => 'Successfully', 'data' => $top_books];
    }

}
