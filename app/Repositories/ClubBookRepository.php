<?php

namespace App\Repositories;

use App\Models\Club;
use App\Models\ClubBook;

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
    public function searchClubBooksByName($bookName)
    {
        return ClubBook::with('book')
            ->whereHas('book', function ($query) use ($bookName) {
                $query->where('name', 'like', "%$bookName%");
            })
            ->get();
    }
}
