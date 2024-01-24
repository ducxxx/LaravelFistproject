<?php

namespace App\Repositories;

use App\Models\Club;
use App\Models\Book;

class BookRepository
{
    /**
     * @param $bookName
     * @return mixed
     */
    public function getBookByName($bookName)
    {
        return Book::where('name', $bookName)->first();
    }

    /**
     * get all book
     */
    public function getAllBook()
    {
        return Book::with(['author', 'category'])->get();
    }

    /**
     * search book by book name
     *
     * @param $bookName
     */
    public function searchBooksByName($bookName)
    {
        return Book::with('author','category')
            ->where('name', 'like', "%".$bookName."%")
            ->get();
    }

    /**
     * get book detail
     *
     * @param int $id
     */
    public function bookDetail(int $id)
    {
        return Book::with('author','category')
            ->where('id', $id)
            ->get();
    }
}
