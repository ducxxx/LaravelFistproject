<?php

namespace App\Repositories;

use App\Models\Club;
use App\Models\ClubBook;
use Illuminate\Support\Facades\DB;

class ClubBookRepository
{
    public function getClubBooksByClubId($club_id)
    {
            $clubBooks = ClubBook::where('club_id', $club_id)->get();
            // Extract club_ids from the ClubBook records
            $clubIds = $clubBooks->pluck('club_id')->toArray();

            // Retrieve the related clubs
            $clubs = Club::whereIn('id', $clubIds)->get();

            // You can also attach ClubBook records to each club if needed
            foreach ($clubs as $club) {
                $club->clubBooks = $clubBooks->where('club_id', $club->id);
                foreach ($club->clubBooks as $clubBook) {
                    $bookName = $clubBook->book->name;
                    $authorName = $clubBook->book->author->name;
                    $categoryName = $clubBook->book->category->name;
                }
            }
            return $clubs;
    }
    public function getClubBooksAll()
    {
        $clubBooks = ClubBook::all();
        $clubIds = $clubBooks->pluck('club_id')->toArray();

        // Retrieve the related clubs
        $clubs = Club::whereIn('id', $clubIds)->get();

        // You can also attach ClubBook records to each club if needed
        foreach ($clubs as $club) {
            $club->clubBooks = $clubBooks->where('club_id', $club->id);
            foreach ($club->clubBooks as $clubBook) {
                $bookName = $clubBook->book->name;
                $authorName = $clubBook->book->author->name;
                $categoryName = $clubBook->book->category->name;
            }
        }
        return $clubs;
    }
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
