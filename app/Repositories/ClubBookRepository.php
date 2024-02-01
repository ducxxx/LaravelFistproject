<?php

namespace App\Repositories;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Club;
use App\Models\ClubBook;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClubBookRepository
{
    /**
     * @param $club_id
     * @return \Illuminate\Support\Collection
     */
    public function getClubBooksByClubId($club_id)
    {
        return DB::table('club_book')
            ->select('club_book.id',
                'club_book.current_count',
                'book.name as book_name',
                'author.name as author_name',
                'category.name as category_name'
            )
            ->join('book', 'club_book.book_id', '=', 'book.id')
            ->join('author', 'book.author_id', '=', 'author.id')
            ->join('category', 'book.category_id', '=', 'category.id')
            ->where('club_book.club_id', $club_id)
            ->get();
    }

    /**
     * @param int $clubId
     * @param string $bookName
     * @return \Illuminate\Support\Collection
     */
    public function searchClubBooksByName(int $clubId, string $bookName)
    {
        return DB::table('club_book')
            ->select(
                'club_book.id',
                'book.name as book_name',
                'author.name as author_name',
                'category.name as category_name'
            )
            ->join('book', 'club_book.book_id', '=', 'book.id')
            ->join('author', 'book.author_id', '=', 'author.id')
            ->join('category', 'book.category_id', '=', 'category.id')
            ->where('club_book.club_id', $clubId)
            ->where('book.name', 'like', '%' . $bookName . '%')
            ->get();
    }

    /**
     * @function Get all Book in table book
     * @return \Illuminate\Support\Collection
     */
    public function getListBook()
    {
        return DB::table('book')
            ->select('book.id',
                'book.name',
                'club.name as club_name',
                'author.name as author_name',
                'category.name as category_name',
                'club_book.init_count as init_count',
                'club_book.current_count as current_count',
                'club_book.id as club_book_id'
            )
            ->join('club_book', 'book.id', '=', 'club_book.book_id')
            ->join('club', 'club_book.club_id', '=', 'club.id')
            ->join('author', 'book.author_id', '=', 'author.id')
            ->join('category', 'book.category_id', '=', 'category.id')
            ->get();
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|object|null
     */
    public function getClubBookDetail($id)
    {
        return DB::table('club_book')
            ->select('club_book.id',
                'club_book.init_count',
                'club_book.current_count',
                'club.name as club_name',
                'book.name as book_name',
                'author.name as author_name',
                'category.name as category_name'
            )
            ->join('book', 'club_book.book_id', '=', 'book.id')
            ->join('author', 'book.author_id', '=', 'author.id')
            ->join('category', 'book.category_id', '=', 'category.id')
            ->join('club', 'club_book.club_id', '=', 'club.id')
            ->where('club_book.id', $id)
            ->first();
    }

    /**
     * @param $id
     * @param $request
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|object|null
     */
    public function updateClubBookDetail($id, $bookUpdate)
    {
        try {
            return ClubBook::where('id', $id)->update([
                'init_count' => $bookUpdate['initCount'],
                'current_count' => $bookUpdate['currentCount'],]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error update data: ' . $e->getMessage());
        }
        return null;
    }

    /**
     * @param $request
     * @return bool
     */
    public function addNewBook($newBook)
    {
        $book = Book::where('name', $newBook['bookName'])->first();
        if ($book) {
            return false;
        } else {
            $author = Author::where('name', $newBook['authorName'])->first();
            if ($author) {
                $authorId = $author->id;
            } else {
                $authorId = DB::table('author')->insertGetId(['name' => $newBook['authorName']]);
            }
            $category = Category::where('name', $newBook['categoryName'])->first();
            if ($category) {
                $categoryId = $category->id;
            } else {
                $categoryId = DB::table('category')->insertGetId(['name' => $newBook['categoryName'],]);
            }
            $newBookId = DB::table('book')->insertGetId(['name' => $newBook['bookName'],
                'category_id' => $categoryId,
                'author_id' => $authorId,]);
            DB::table('club_book')->insert(['book_id' => $newBookId,
                'club_id' => $newBook['clubId'],
                'code' => "A1-" . (string)$newBookId,
                'init_count' => $newBook['initCount'],
                'current_count' => $newBook['currentCount'],]);
            return true;
        }
    }

    /**
     * @param $club_id
     * @return \Illuminate\Support\Collection
     */
    public function getClubBookByClubId($club_id)
    {
        return DB::table('club_book')
            ->join('book', 'club_book.book_id', '=', 'book.id')
            ->join('author', 'book.author_id', '=', 'author.id')
            ->join('category', 'book.category_id', '=', 'category.id')
            ->join('club', 'club_book.club_id', '=', 'club.id')
            ->where('club_book.club_id', $club_id)
            ->select('club_book.id', 'book.name as book_name')
            ->get();
    }
}
