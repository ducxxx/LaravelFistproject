<?php

namespace App\Repositories;

use App\Models\Club;
use App\Models\Book;

class BookRepository
{
    public function getBookByName($bookName)
    {
        return Book::where('name', $bookName)->first();
    }
    public function getAllBook()
    {
        return Book::with(['author', 'category'])->get();
    }
    public function searchBooksByName($bookName)
    {
        return Book::with('author','category')
            ->where('name', 'like', "%".$bookName."%")
            ->get();
    }
}
