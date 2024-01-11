<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookVoteController;
use App\Http\Controllers\ClubBookController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'showHomePage'])->name('homepage');
Route::get('/app', [HomeController::class, 'showAppPage'])->name('app');
Route::get('/empty', [HomeController::class, 'showEmptyPage'])->name('empty');


//User
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register');

Route::post('/register', [UserController::class, 'register'])->name('user.register');

Route::middleware(['auth'])->group(function () {
    Route::get('/my-profile', [UserController::class, 'viewMyProfile'])->name('user.profile');
    Route::put('/users/update/{id}', [UserController::class, 'update'])->name('user.update');
});

Route::middleware(['checkLogin'])->group(function () {
    Route::get('/send-email', [EmailController::class, 'sendEmailWithCode'])->name('sendEmailWithCode');
    Route::get('/verify/{code}', [EmailController::class, 'verifyCode'])->name('verifyCode');
});
//Auth

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('user.login');

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/change-password', [AuthController::class, 'showChangePasswordForm'])->name('show.change.password');
    Route::post('/change-password', [AuthController::class, 'changePassword'])->name('change.password');
});
Route::get('/forgot-password', [AuthController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
//Route::post('/logout', [AuthController::class, 'logout'])->name('user.logout');


//Club

Route::get('/clubs', [ClubController::class, 'showClubListPage'])->name('club.page');

//ClubBook
Route::middleware(['checkLogin'])->group(function () {
    Route::get('/club/books/{club_id}', [ClubBookController::class, 'getBookClubsByClubId'])->name('club.book');
    Route::get('/club/books/page', [ClubBookController::class, 'showBookListPage'])->name('club.book.page');
    Route::get('/club/book/search/{club_id}/{book_name}', [ClubBookController::class, 'searchClubBooksByName'])->name('club.book.search');
});

Route::middleware(['checkLogin'])->group(function () {
    Route::get('/book/star/{book_id}', [BookVoteController::class, 'bookStarById'])->name('book.star');
    Route::get('/book/comment/{book_id}', [BookVoteController::class, 'bookCommentByBookId'])->name('book.comment');
    Route::post('/book/vote/create', [BookVoteController::class, 'createBookVote'])->name('book.vote.create');
});
//Book
Route::get('/book/all', [BookController::class, 'getAllBook'])->name('book.all');
Route::get('/book/search/{book_name}', [BookController::class, 'searchBooksByName'])->name('book.search');
Route::get('/book/detail/{id}', [BookController::class, 'bookDetail'])->name('book.detail');


//Order
Route::middleware(['checkLogin'])->group(function () {
    Route::post('/order/create', [OrderController::class, 'create'])->name('order.create');
    Route::get('/order/list', [OrderController::class, 'showOrderList'])->name('order.list');

    Route::get('/order/get/list/{user_id}', [OrderController::class, 'getOrderByUserId'])->name('order.get.list');

    Route::any('/order/dialog', [OrderController::class, 'showOrderDialog'])->name('order.dialog');
});

Route::middleware(['checkStaff'])->group(function () {
    Route::get('/order/club/list', [OrderController::class, 'getOrderList'])->name('order.get.list.control');
});

Route::middleware(['checkStaff'])->group(function () {
    Route::get('/book/calendar', [OrderController::class, 'getBookCalendar'])->name('book.calendar');

});
Route::get('list/book/calendar', [OrderController::class, 'getListBookCalendar'])->name('list.book.calendar');


//staff check
Route::middleware(['checkStaff'])->group(function () {
    Route::get('/club/member/list', [MemberController::class, 'showMemberListPage'])->name('member.get.list');
    Route::get('/member/detail/{id}', [MemberController::class, 'memberDetail'])->name('member.detail');
    Route::put('/member/update/{id}', [MemberController::class, 'updateMemberDetail'])->name('member.update');
    Route::get('/member/search/{phone_number}', [MemberController::class, 'getMemberByPhoneNumber'])
        ->name('member.search.phone');
});

//club book staff
Route::middleware(['checkStaff'])->group(function () {
    Route::get('/club/book/list', [ClubBookController::class, 'getListBook'])->name('book.get.list');
    Route::get('/club/book/detail/{id}', [ClubBookController::class, 'getClubBookDetail'])->name('club.book.detail');
    Route::any('/club/book/update/{id}', [ClubBookController::class, 'updateClubBookDetail'])->name('club.book.update');
    Route::get('/club/book/add/form', [ClubBookController::class, 'bookAddForm'])->name('book.add.form');
    Route::post('/club/book/add', [ClubBookController::class, 'addNewBook'])->name('book.add');
    Route::get('/club/book/{club_id}', [ClubBookController::class, 'getClubBookByClubId'])->name('club.book.by.clubId');
});

//order staff
Route::middleware(['checkStaff'])->group(function () {
    Route::get('/order/confirm/{id}', [OrderController::class, 'orderConfirm'])->name('order.confirm');
    Route::get('/order/return/{id}', [OrderController::class, 'orderReturn'])->name('order.return');
    Route::post('/order/offline/dialog', [OrderController::class, 'orderOfflineDialog'])->name('order.offline.dialog');
    Route::post('/order/offline/create', [OrderController::class, 'orderOfflineCreate'])->name('order.offline.create');
    Route::get('/report', [OrderController::class, 'reportPage'])->name('report.page');

});



