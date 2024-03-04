<?php

namespace App\Http\Controllers;
use App\Services\BookService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
     * search book
     * @param $bookName
     */
    public function searchBooksByName($bookName)
    {
        return $this->bookService->searchBooksByName($bookName);
    }

    /**
     * get book detail
     * @param int $id
     */
    public function bookDetail(int $id)
    {
        return $this->bookService->bookDetail($id);
    }
}
