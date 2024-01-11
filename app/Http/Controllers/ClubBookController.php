<?php

namespace App\Http\Controllers;

use App\Services\ClubBookService;
use Illuminate\Http\Request;

class ClubBookController extends Controller
{
    protected $clubBookService;

    public function __construct(ClubBookService $clubBookService)
    {
        $this->clubBookService = $clubBookService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showBookListPage()
    {
        return view('includes.BookList');
    }

    /**
     * @param $club_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     */
    public function getBookClubsByClubId($club_id)
    {
        session(['club_id' => $club_id]);
        $clubBooks = $this->clubBookService->getClubBooksByClubId($club_id);
        if ($clubBooks) {
            return view('pages.book.BookList', compact('clubBooks','club_id'));
        }
        $empty = "Don't have Book in Club";
        return view('pages.EmptyPage',compact($empty))->with('status',404);
    }

    /**
     * @param $clubId
     * @param $bookName
     * @return \Illuminate\Support\Collection
     */
    public function searchClubBooksByName($clubId, $bookName)
    {
        $books = $this->clubBookService->searchClubBooksByName($clubId,$bookName);
        return $books;
    }

    public function getListBook()
    {
        $books = $this->clubBookService->getListBook();
        if ($books) {
//            dd($books);
            return view('pages.book.ClubBookList', compact('books'));
        }
        $empty = "Don't have Book in Club";
        return view('pages.EmptyPage',compact($empty))->with('status',404);
    }


    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getClubBookDetail(int $id)
    {
        $book = $this->clubBookService->getClubBookDetail($id);
        if ($book) {
            return view('pages.book.BookDetail', compact('book'));
        }
        $empty = "Don't have Book in Club";
        return view('pages.EmptyPage',compact($empty))->with('status',404);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function updateClubBookDetail(Request $request, $id)
    {
        $book = $this->clubBookService->updateClubBookDetail($id, $request);
        if ($book) {
            return redirect()->route('club.book.detail', ['id' => $id])->with('success',"Update Book success");
        }
        $empty = "Don't have Book in Club";
        return view('pages.EmptyPage',compact($empty))->with('status',404);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function bookAddForm()
    {
        return view('pages.book.AddBook');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function addNewBook(Request $request)
    {
        return $this->clubBookService->addNewBook( $request);
    }

    public function getClubBookByClubId(int $club_id)
    {
        $book = $this->clubBookService->getClubBookByClubId($club_id);
        return $book;
    }
}
