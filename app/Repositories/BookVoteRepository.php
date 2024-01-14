<?php

namespace App\Repositories;

use App\Models\BookVote;
use Illuminate\Support\Facades\DB;

class BookVoteRepository
{
    /**
     * @param int $book_id
     * @return \Illuminate\Support\Collection
     */
    public function bookStarById(int $book_id)
    {
        return DB::table('book_vote')
            ->join('users', 'book_vote.user_id', '=', 'users.id')
            ->join('book', 'book_vote.book_id', '=', 'book.id')
            ->join('category', 'category.id', '=', 'book.category_id')
            ->join('author', 'author.id', '=', 'book.author_id')
            ->where('book_vote.book_id', $book_id)
            ->select('book.id as book_id', 'users.username as username', 'users.avatar as user_avatar',
                'book.name as book_name', 'book.image as book_image', 'author.name as author_name',
                'category.name as category_name', 'book_vote.star_vote as star_vote',
                'book_vote.book_comment as book_comment')
            ->get();
    }

    public function checkComment(int $user_id, int $book_id)
    {
        $orderDetail = DB::table('order_detail')
            ->join('club_book', 'order_detail.club_book_id', '=', 'club_book.id')
            ->join('book', 'club_book.book_id', '=', 'book.id')
            ->join('order', 'order.id', '=', 'order_detail.order_id')
            ->join('member', 'order.member_id', '=', 'member.id')
            ->join('users', 'member.user_id', '=', 'users.id')
            ->where('book.id', $book_id)
            ->where('users.id', $user_id)
            ->select('order_detail.*')
            ->get();

        $bookStars = DB::table('book_vote')
            ->where('book_vote.book_id', $book_id)
            ->where('book_vote.user_id', $user_id)
            ->select('book_vote.*')
            ->get();

        if (count($orderDetail) > count($bookStars)) {
            return 1;
        } else {
            return 0;
        }
    }

    public function bookDetail(int $book_id)
    {
        return DB::table('book')
            ->join('category', 'category.id', '=', 'book.category_id')
            ->join('author', 'author.id', '=', 'book.author_id')
            ->where('book.id', $book_id)
            ->select('book.id as book_id', 'book.name as book_name', 'author.name as author_name',
                'category.name as category_name', 'book.description as book_description', 'book.image as book_image')
            ->first();
    }


    /**
     * @param int $book_id
     * @return \Illuminate\Support\Collection
     */
    public function bookCommentByBookId(int $book_id)
    {
        return DB::table('book_comment')
            ->join('user', 'book_comment.user_id', '=', 'user.id')
            ->where('book_comment.book_id', $book_id)
            ->select('book_comment.book_id as book_id', 'user.name as user_name',
                'book_comment.book_comment as book_comment')
            ->get();
    }

    /**
     * @param $request
     * @return BookVote
     */
    public function createBookVote($request)
    {
        $bookVote = new BookVote();
        if ($request->input('book_id')) {
            $bookVote->book_id = $request->input('book_id');
        }
        if ($request->input('rating')) {
            $bookVote->star_vote = $request->input('rating');
        }
        if ($request->input('book_comment')) {
            $bookVote->book_comment = $request->input('book_comment');
        }
        $bookVote->user_id = auth()->id();
        if ($bookVote->book_comment && $bookVote->star_vote) {
            $bookVote->save();
        }
        return $bookVote;
    }
}
