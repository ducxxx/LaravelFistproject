<?php

namespace App\Services;

use App\Repositories\BookVoteRepository;

class BookVoteService
{
    private $bookVoteRepository;

    /**
     * BookVoteService constructor.
     * @param BookVoteRepository $bookVoteRepository
     */
    public function __construct(BookVoteRepository $bookVoteRepository)
    {
        $this->bookVoteRepository = $bookVoteRepository;
    }

    /**
     * @param int $bookId
     * @return \Illuminate\Support\Collection
     */
    public function bookStarById(int $bookId)
    {
        //$book_star = $this->bookVoteRepository->bookStarById($book_id);
        //$check_commnet = $this->bookVoteRepository->checkComment(auth()->id(),$book_id);
        return $this->bookVoteRepository->bookStarById($bookId);
    }

    /**
     * @param int $bookId
     * @param int $userId
     * @return bool
     */
    public function checkComment(int $bookId, int $userId)
    {
        return $this->bookVoteRepository->checkComment($userId, $bookId);
    }

    /**
     * @param int $bookId
     * @return object|null
     */
    public function bookDetail(int $bookId)
    {
        return $this->bookVoteRepository->bookDetail($bookId);
    }

    /**
     * @param int $bookId
     * @return \Illuminate\Support\Collection
     */
    public function bookCommentByBookId(int $bookId)
    {
        return $this->bookVoteRepository->bookCommentByBookId($bookId);
    }

    /**
     * @param $dataVote
     * @param $userId
     * @return bool
     */
    public function createBookVote($dataVote, $userId)
    {
        return $this->bookVoteRepository->createBookVote($dataVote, $userId);
    }
}
