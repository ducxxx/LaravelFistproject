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
        $book_star = $this->bookVoteRepository->bookStarById($book_id);
        $check_commnet = $this->bookVoteRepository->checkComment(auth()->id(),$book_id);
        return $this->bookVoteRepository->bookStarById($book_id);
    }

    public function checkComment(int $book_id)
    {
        return $this->bookVoteRepository->checkComment(auth()->id(),$book_id);
    }

    public function bookDetail(int $book_id)
    {
        return $this->bookVoteRepository->bookDetail($book_id);
    }

    /**
     * @param int $book_id
     * @return \Illuminate\Support\Collection
     */
    public function bookCommentByBookId(int $book_id)
    {
        return $this->bookVoteRepository->bookCommentByBookId($book_id);
    }

    /**
     * create vote
     * @param $request
     */
    public function createBookVote($request)
    {
        return $this->bookVoteRepository->createBookVote($request);
    }
}
