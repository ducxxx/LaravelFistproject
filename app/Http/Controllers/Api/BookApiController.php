<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Services\BookService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookApiController extends Controller
{
    protected $bookService;
    protected $apiResponse;

    public function __construct(BookService $bookService, ApiResponse $apiResponse)
    {
        $this->bookService = $bookService;
        $this->apiResponse = $apiResponse;
    }

    public function topBorrowingBooks(Request $request, $year_month)
    {
        if (!$request->isMethod('get')) {
            return $this->apiResponse->RESPONSE_STATUS_CODE_405();
        }

        $validator = Validator::make(['year_month' => $year_month], [
            'year_month' => 'required|regex:/^\d{6}$/'
        ]);

        if ($validator->fails()) {
            return $this->apiResponse->RESPONSE_STATUS_CODE_400();
        }

        $top_books = $this->bookService->topBorrowingBooks($year_month);
        if ($top_books->isEmpty()) {
            return $this->apiResponse->RESPONSE_STATUS_CODE_200([]);
        }
        return $this->apiResponse->RESPONSE_STATUS_CODE_200($top_books);
    }
}
