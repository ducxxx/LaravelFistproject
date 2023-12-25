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
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchBooksByName($bookName)
    {
        $books = $this->bookService->searchBooksByName($bookName);

        // Transform and return the response as needed
        return response()->json($books);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function bookDetail(int $id)
    {
        $books = $this->bookService->bookDetail($id);

        // Transform and return the response as needed
        return response()->json($books);
    }
}
