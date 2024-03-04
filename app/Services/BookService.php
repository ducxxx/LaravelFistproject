<?php

namespace App\Services;

use App\Models\Book;
use App\Repositories\BookRepository;
use Carbon\Carbon;

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

    /**
     * @param string $year_month
     * @return \Illuminate\Support\Collection
     */
    public function topBorrowingBooks(string $year_month)
    {
        // Get list of orders borrowing books in the specified month
        $year = Carbon::createFromFormat('Ym', $year_month)->year;
        $month = Carbon::createFromFormat('Ym', $year_month)->month;
        return $this->bookRepository->topBorrowingBooks($year,$month);
    }

}
