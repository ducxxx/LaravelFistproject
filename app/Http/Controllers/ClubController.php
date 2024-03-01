<?php

namespace App\Http\Controllers;

use App\Services\ClubService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ClubController extends Controller
{
    protected $clubService;
    public function __construct(ClubService $clubService)
    {
        $this->clubService = $clubService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showClubListPage()
    {
        $clubs = $this->clubService->getAllClubs();
        if ($clubs) {
            return view('pages.club.ClubList', compact('clubs'));
        }

        $empty = "Don't have Club";
        return view('pages.EmptyPage',compact($empty))->with('status',404);
    }
}
