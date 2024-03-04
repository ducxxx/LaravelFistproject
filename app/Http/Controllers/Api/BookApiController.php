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

    /**
     * @param Request $request
     * @param $year_month
     * @return \Illuminate\Http\JsonResponse
     */
    public function topBorrowingBooks(Request $request, $year_month)
    {
        if (!$request->isMethod('get')) {
            return $this->apiResponse->errorMethodNotAllowed();
        }

        $validator = Validator::make(['year_month' => $year_month], [
            'year_month' => 'required|regex:/^\d{6}$/'
        ]);

        if ($validator->fails()) {
            return $this->apiResponse->errorBadRequest();
        }

        $top_books = $this->bookService->topBorrowingBooks($year_month);
        if ($top_books->isEmpty()) {
            return $this->apiResponse->successfullResponse([]);
        }
        return $this->apiResponse->successfullResponse($top_books);
    }
}
