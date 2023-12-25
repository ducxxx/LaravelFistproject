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
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllBook()
    {
        return Book::with(['author', 'category'])->get();
    }

    /**
     * @param $bookName
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function searchBooksByName($bookName)
    {
        return Book::with('author','category')
            ->where('name', 'like', "%".$bookName."%")
            ->get();
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function bookDetail(int $id)
    {
        return Book::with('author','category')
            ->where('id', $id)
            ->get();
    }
}
