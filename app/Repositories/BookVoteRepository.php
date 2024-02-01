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
            ->select(
                'book.id as book_id',
                'users.username as username',
                'users.avatar as user_avatar',
                'book.name as book_name',
                'book.image as book_image',
                'author.name as author_name',
                'category.name as category_name',
                'book_vote.star_vote as star_vote',
                'book_vote.book_comment as book_comment'
            )
            ->join('users', 'book_vote.user_id', '=', 'users.id')
            ->join('book', 'book_vote.book_id', '=', 'book.id')
            ->join('category', 'category.id', '=', 'book.category_id')
            ->join('author', 'author.id', '=', 'book.author_id')
            ->where('book_vote.book_id', $book_id)
            ->get();
    }

    /**
     * @param int $user_id
     * @param int $book_id
     * @return bool
     */
    public function checkComment(int $user_id, int $book_id)
    {
        $countOrderDetail = DB::table('order_detail')
            ->join('club_book', 'order_detail.club_book_id', '=', 'club_book.id')
            ->join('book', 'club_book.book_id', '=', 'book.id')
            ->join('order', 'order.id', '=', 'order_detail.order_id')
            ->join('member', 'order.member_id', '=', 'member.id')
            ->join('users', 'member.user_id', '=', 'users.id')
            ->where('book.id', $book_id)
            ->where('users.id', $user_id)
            ->count();

        $countBookStars = DB::table('book_vote')
            ->where('book_vote.book_id', $book_id)
            ->where('book_vote.user_id', $user_id)
            ->count();

        if ($countOrderDetail > $countBookStars) {
            return true;
        }

        return false;
    }

    /**
     * @param int $book_id
     * @return object|null
     */
    public function bookDetail(int $book_id)
    {
        return DB::table('book')
            ->select(
                'book.id as book_id',
                'book.name as book_name',
                'author.name as author_name',
                'category.name as category_name',
                'book.description as book_description',
                'book.image as book_image'
            )
            ->join('category', 'category.id', '=', 'book.category_id')
            ->join('author', 'author.id', '=', 'book.author_id')
            ->where('book.id', $book_id)
            ->first();
    }


    /**
     * @param int $book_id
     * @return \Illuminate\Support\Collection
     */
    public function bookCommentByBookId(int $book_id)
    {
        return DB::table('book_comment')
            ->select(
                'book_comment.book_id as book_id',
                'user.name as user_name',
                'book_comment.book_comment as book_comment'
            )
            ->join('user', 'book_comment.user_id', '=', 'user.id')
            ->where('book_comment.book_id', $book_id)
            ->get();
    }

    /**
     * @param $dataVote
     * @param $userId
     * @return bool
     */
    public function createBookVote($dataVote, $userId)
    {
        $bookVote = new BookVote();
        $bookVote->user_id = $userId;
        if ($dataVote['book_id']) {
            $bookVote->book_id = $dataVote['book_id'];
        }

        if ($dataVote['rating']) {
            $bookVote->star_vote = $dataVote['rating'];
        }

        if ($dataVote['book_comment']) {
            $bookVote->book_comment = $dataVote['book_comment'];
        }

        if ($bookVote->save()) {
            return true;
        }

        return false;
    }
}
