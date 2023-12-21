<?php

namespace App\Repositories;

use App\Models\BookVote;
use App\Models\Club;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class BookVoteRepository
{
    public function bookStarById(int $book_id)
    {
        $bookStars = DB::table('book_vote')
            ->where('book_vote.book_id', $book_id)
            ->select('book_vote.book_id as book_id', 'book_vote.star_vote as star_vote')
            ->get();
        return $bookStars;
    }
}
