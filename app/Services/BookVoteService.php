<?php

namespace App\Services;

use App\Repositories\BookVoteRepository;

class BookVoteService
{
    private $bookVoteRepository;

    public function __construct(BookVoteRepository $bookVoteRepository)
    {
        $this->bookVoteRepository = $bookVoteRepository;
    }

    public function bookStarById(int $book_id)
    {
        return $this->bookVoteRepository->bookStarById($book_id);
    }
}
