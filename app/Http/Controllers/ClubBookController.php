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
     * show list book
     *
     * @return View|mixed
     */
    public function showBookListPage()
    {
        return view('includes.BookList');
    }

    /**
     * get list book club by ID
     * @param $club_id
     *
     * @return View|mixed
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
        return $this->clubBookService->searchClubBooksByName($clubId,$bookName);
    }

    /**
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function getListBook()
    {
        $books = $this->clubBookService->getListBook();
        if ($books) {
            return view('pages.book.ClubBookList', compact('books'));
        }
        $empty = "Don't have Book in Club";
        return view('pages.EmptyPage',compact($empty))->with('status',404);
    }


    /**
     * @param int $id
     * @return View
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
     * @return View
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
     * @return View
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

    /**
     * @param int $club_id
     * @return \Illuminate\Support\Collection
     */
    public function getClubBookByClubId(int $club_id)
    {
        return $this->clubBookService->getClubBookByClubId($club_id);
    }
}
