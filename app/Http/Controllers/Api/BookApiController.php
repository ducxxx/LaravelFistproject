<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\BookService;
use Carbon\Carbon;
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
     * api get top 3 most borrowed books of the month
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
            'year_month' => 'required|regex:/^\d{6}$/|date_format:Ym'
        ],['year_month.date_format' => 'Please input year month follow format YYYYMM',]);

        if ($validator->fails()) {
            if($validator->errors()->first('year_month')){
                return $this->apiResponse->errorBadRequest($validator->errors()->first('year_month'));
            }
            return $this->apiResponse->errorBadRequest();
        }
        $top_books = $this->bookService->topBorrowingBooks($year_month);
        if ($top_books->isEmpty()) {
            return $this->apiResponse->successfullResponse([]);
        }
        return $this->apiResponse->successfullResponse($top_books);
    }
}
