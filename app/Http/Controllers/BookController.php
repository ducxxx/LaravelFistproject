<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BookService;
class BookController extends Controller
{
    protected $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllBook()
    {
        $clubBooks = $this->bookService->getAllBook();
        return $clubBooks;
    }

    /**
     * @param $bookName
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function searchBooksByName($bookName)
    {
        $books = $this->bookService->searchBooksByName($bookName);
        return $books;
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function bookDetail(int $id)
    {
        $books = $this->bookService->bookDetail($id);
        return $books;
    }
}
