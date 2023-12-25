<?php

namespace App\Http\Controllers;

use App\Services\ClubService;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    protected $clubService;

    public function __construct(ClubService $clubService)
    {
        $this->clubService = $clubService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     */
    public function showClubListPage()
    {
        $clubs = $this->clubService->getAllClubs();
        if ($clubs) {
            return view('pages.ClubList', compact('clubs'));
        }

        return response()->json(['error' => 'Dont Have Club'], 404);
    }
}
