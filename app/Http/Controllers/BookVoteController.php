<?php

namespace App\Http\Controllers;

use App\Services\BookVoteService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
     * @param $bookId
     * @return View|mixed
     */
    public function bookStarById($bookId)
    {
        $userId = Auth::id();
        $book = $this->bookVoteService->bookStarById($bookId);
        $checkComment = $this->bookVoteService->checkComment($bookId, $userId);
        $bookDetail = $this->bookVoteService->bookDetail($bookId);

        return view('pages.book.BookVote', compact('book', 'checkComment', 'bookDetail'));
    }

    /**
     * @param $bookId
     * @return \Illuminate\Support\Collection
     */
    public function bookCommentByBookId($bookId)
    {
        return $this->bookVoteService->bookCommentByBookId($bookId);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createBookVote(Request $request)
    {
        $dataBook = $request->all();
        $userId = Auth::id();
        $bookVote = $this->bookVoteService->createBookVote($dataBook, $userId);
        if ($bookVote) {
            Session::flash('success', 'Comment success');
        } else {
            Session::flash('error', 'Comment Fail');
        }

        return Redirect::route('book.star', ['book_id' => $dataBook['book_id']]);
    }

}
