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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function bookStarById($book_id)
    {
        $book = $this->bookVoteService->bookStarById($book_id);
        $checkComment = $this->bookVoteService->checkComment($book_id);
        $bookDetail = $this->bookVoteService->bookDetail($book_id);
//        dd($bookDetail);
//        dd($book);
        return view('pages.book.BookVote', compact('book', 'checkComment','bookDetail'));
    }

    /**
     * @param $book_id
     * @return \Illuminate\Support\Collection
     */
    public function bookCommentByBookId($book_id)
    {
        $book_stars = $this->bookVoteService->bookCommentByBookId($book_id);

        return $book_stars;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createBookVote(Request $request)
    {
        $book_vote = $this->bookVoteService->createBookVote($request);
        if ($book_vote->book_comment){
            Session::flash('success', 'Comment success');
            return Redirect::route('book.star', ['book_id' => $request->input('book_id')]);
        }else{
            Session::flash('error', 'Comment Fail');
            return Redirect::route('book.star', ['book_id' => $request->input('book_id')]);
        }
    }

}
