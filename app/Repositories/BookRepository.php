<?php

namespace App\Repositories;

use App\Models\Club;
use App\Models\Book;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;

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

    public function topBorrowingBooks(string $year_month)
    {
        return DB::table('order_detail')
            ->select('book.name as book_name','author.name as author_name', 'category.name as category_name',
                DB::raw('COUNT(*) as total'))
            ->join('club_book', 'order_detail.club_book_id', '=', 'club_book.id')
            ->join('book', 'club_book.book_id', '=', 'book.id')
            ->join('author', 'book.author_id', '=', 'author.id')
            ->join('category', 'book.category_id', '=', 'category.id')
            ->whereYear('order_detail.created_at', substr($year_month, 0, 4))
            ->whereMonth('order_detail.created_at', substr($year_month, 4, 2))
            ->groupBy('club_book.book_id')
            ->orderByDesc('total')
            ->limit(3)
            ->get();
    }
}
