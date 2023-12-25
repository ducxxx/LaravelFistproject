<?php

namespace App\Http\Controllers;

use App\Services\BookVoteService;
use Illuminate\Http\Request;

class BookVoteController extends Controller
{
    protected $bookVoteService;

    public function __construct(BookVoteService $bookVoteService)
    {
        $this->bookVoteService = $bookVoteService;
    }

    /**
     * @param $book_id
     * @return \Illuminate\Support\Collection
     */
    public function bookStarById($book_id)
    {
        $book_stars = $this->bookVoteService->bookStarById($book_id);

        return $book_stars;
    }
}
