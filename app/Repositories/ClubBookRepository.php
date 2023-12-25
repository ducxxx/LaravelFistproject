<?php

namespace App\Repositories;

use App\Models\Club;
use App\Models\ClubBook;
use Illuminate\Support\Facades\DB;

class ClubBookRepository
{
    /**
     * @param $club_id
     * @return \Illuminate\Support\Collection
     */
    public function getClubBooksByClubId($club_id)
    {
        $clubBooks = DB::table('club_book')
            ->join('book', 'club_book.book_id', '=', 'book.id')
            ->join('author', 'book.author_id', '=', 'author.id')
            ->join('category', 'book.category_id', '=', 'category.id')
            ->where('club_book.club_id', $club_id)
            ->select('club_book.*', 'book.name as book_name', 'author.name as author_name', 'category.name as category_name')
            ->get();
        return $clubBooks;
    }

    /**
     * @param int $clubId
     * @param string $bookName
     * @return \Illuminate\Support\Collection
     */
    public function searchClubBooksByName(int $clubId, string $bookName)
    {
        $clubBooks = DB::table('club_book')
            ->join('book', 'club_book.book_id', '=', 'book.id')
            ->join('author', 'book.author_id', '=', 'author.id')
            ->join('category', 'book.category_id', '=', 'category.id')
            ->where('club_book.club_id', $clubId)
            ->where('book.name', 'like', '%' . $bookName . '%')
            ->select('club_book.*', 'book.name as book_name', 'author.name as author_name', 'category.name as category_name')
            ->get();
        return $clubBooks;
    }
}
