<?php

namespace App\Http\Controllers;

use App\Services\BookVoteService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class BookVoteController extends Controller
{
    protected $bookVoteService;
    public function __construct(BookVoteService $bookVoteService)
    {
        $this->bookVoteService = $bookVoteService;
    }

    /**
     * @param $book_id
     */
    public function bookStarById($book_id)
    {
        $book = $this->bookVoteService->bookStarById($book_id);
        $checkComment = $this->bookVoteService->checkComment($book_id);
        $bookDetail = $this->bookVoteService->bookDetail($book_id);
        return view('pages.book.BookVote', compact('book', 'checkComment', 'bookDetail'));
    }

    /**
     * @param $book_id
     */
    public function bookCommentByBookId($book_id)
    {
        return $this->bookVoteService->bookCommentByBookId($book_id);
    }

    /**
     * @param Request $request
     */
    public function createBookVote(Request $request)
    {
        $book_vote = $this->bookVoteService->createBookVote($request);
        if (isset($book_vote) && $book_vote->book_comment) {
            Session::flash('success', 'Comment success');
            return Redirect::route('book.star', ['book_id' => $request->input('book_id')]);
        } else {
            Session::flash('error', 'Comment Fail');
            return Redirect::route('book.star', ['book_id' => $request->input('book_id')]);
        }
    }

}
