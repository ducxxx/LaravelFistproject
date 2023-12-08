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
    public function showBookListPage()
    {
        return view('includes.BookList');
    }
    public function getBookClubsByClubId($club_id)
    {
        $clubBooks = $this->clubBookService->getClubBooksByClubId($club_id);
        if ($clubBooks) {
            return view('includes.BookList', compact('clubBooks'));
        }

        return response()->json(['error' => 'Dont Have Club'], 404);
    }
    public function getClubBooksAll()
    {
        $clubBooks = $this->clubBookService->getClubBooksAll();
        return $clubBooks;
    }
    public function searchClubBooksByName($bookName)
    {
        $books = $this->clubBookService->searchClubBooksByName($bookName);

        // Transform and return the response as needed
        return response()->json($books);
    }
}
