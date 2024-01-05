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
}
