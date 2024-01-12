<?php

namespace App\Http\Controllers;
use App\Services\BookService;
class BookController extends Controller
{
    protected $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    /**
     * get all book
     */
    public function getAllBook()
    {
        return $this->bookService->getAllBook();
    }

    /**
     * @param $bookName
     */
    public function searchBooksByName($bookName)
    {
        return $this->bookService->searchBooksByName($bookName);
    }

    /**
     * @param int $id
     */
    public function bookDetail(int $id)
    {
        return $this->bookService->bookDetail($id);
    }
}
