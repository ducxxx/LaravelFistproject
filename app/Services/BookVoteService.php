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

    /**
     * @param int $book_id
     * @return \Illuminate\Support\Collection
     */
    public function bookStarById(int $book_id)
    {
        return $this->bookVoteRepository->bookStarById($book_id);
    }
}
