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

    public function topBorrowingBooks(Request $request, $year_month)
    {
        if (!$request->isMethod('get')) {
            return response()->json(['status_code' => '405', 'message' => 'Method Not Allowed'],405);
        }

        $validator = Validator::make(['year_month' => $year_month], [
            'year_month' => 'required|regex:/^\d{6}$/'
        ]);

        if ($validator->fails()) {
            return response()->json(['status_code' => '400', 'message: ' => 'Bad Request'],400);
        }
        $response = $this->bookService->topBorrowingBooks($year_month);

        return response()->json($response);
    }
}
