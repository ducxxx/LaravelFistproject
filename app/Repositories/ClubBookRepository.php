<?php

namespace App\Repositories;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
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
        return DB::table('club_book')
            ->select(
                'club_book.*', // TODO: liệt kê những trường đang dùng, không liệt kê all
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
                'club_book.*', // TODO: liệt kê những trường đang dùng, không liệt kê all
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
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getListBook()
    {
        return DB::table('book')
            ->select(
                'book.*', // TODO: liệt kê những trường đang dùng, không liệt kê all
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
            ->paginate(10);
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|object|null
     */
    public function getClubBookDetail($id)
    {
        return DB::table('club_book')
            ->select(
                'club_book.*', // TODO: liệt kê những trường đang dùng, không liệt kê all
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
    public function updateClubBookDetail($id, $request)
    {
        // TODO: thay thế bằng hàm ClubBook::where('id', $id)->update([data ưpdate])
        $clubBook = ClubBook::find($id);
        if ($clubBook) {
            $clubBook->init_count = $request->input('initCount');
            $clubBook->current_count = $request->input('currentCount');
            $clubBook->save();
        }

        return $clubBook;
    }

    /**
     * @param $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addNewBook($request)
    {
        $book = Book::where('name', $request->input('bookName'))->first();
        if ($book) {
            // TODO: chuyển redirect về controller
            return redirect()->route('book.get.list')->with("error", "book is exist please search in list");
        } else {
            $author = Author::where('name', $request->input('authorName'))->first();
            //$authorId = 0;
            if ($author) {
                $authorId = $author->id;
            } else {
                // TODO: chuyển thành hàm insertGetId
                $newAuthor = new Author();
                $newAuthor->name = $request->input('authorName');
                $newAuthor->save();
                $authorId = $newAuthor->id;
            }
            $category = Category::where('name', $request->input('categoryName'))->first();
            //$categoryId = 0;
            if ($category) {
                $categoryId = $category->id;
            } else {
                // TODO: chuyển thành hàm insertGetId
                $newCategory = new Category();
                $newCategory->name = $request->input('categoryName');
                $newCategory->save();
                $categoryId = $newCategory->id;
            }

            // TODO: không dùng request input trong repository tham khảo BookVoteController::createBookVote
            $newBook = new Book();
            $newBook->name = $request->input('bookName');
            $newBook->category_id = $categoryId;
            $newBook->author_id = $authorId;
            $newBook->save();

            // TODO: chuyển thành hàm insert - không dùng request input để lấy dữ liệu
            $newClubBook = new ClubBook();
            $newClubBook->book_id = $newBook->id;
            $newClubBook->club_id = $request->input('clubId');
            $newClubBook->code = "A1-" . (string)$newBook->id;
            $newClubBook->init_count = $request->input('initCount');
            $newClubBook->current_count = $request->input('currentCount');
            $newClubBook->save();

            // TODO: chuyển redirect về controller
            return redirect()->route('book.get.list')->with("success", "add Book success");
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
            ->select('club_book.*', 'club.name as club_name', 'book.name as book_name',
                'author.name as author_name', 'category.name as category_name')
            ->get();
    }
}
