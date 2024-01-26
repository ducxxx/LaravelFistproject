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

// Homepage
Route::get('/', [HomeController::class, 'showAppPage'])->name('home');
Route::get('/empty', [HomeController::class, 'showEmptyPage'])->name('empty');

// User Register
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [UserController::class, 'register'])->name('user.register');

// Auth Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('user.login');

// Forgot password management
Route::get('/forgot-password', [AuthController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/forgot-password/confirm', [AuthController::class, 'showConfirmPasswordForm'])
    ->name('password.confirm.form');
Route::post('/send-email/forget-password', [EmailController::class, 'sendEmailForgetPasswordWithCode'])
    ->name('sendEmailForgetPasswordWithCode');
Route::post('/change-new-password/{email}', [EmailController::class, 'changeNewPassword'])->name('password.new.change');

Route::get('/daily-out-date', [OrderController::class, 'getDailyMemberOutOfDate'])->name('order.out.date');

Route::middleware(['auth'])->group(function () {
    // profile route
    Route::get('/my-profile', [UserController::class, 'viewMyProfile'])->name('user.profile');
    Route::put('/users/update/{id}', [UserController::class, 'update'])->name('user.update');

    // change password management
    Route::get('/change-password', [AuthController::class, 'showChangePasswordForm'])->name('show.change.password');
    Route::post('/change-password', [AuthController::class, 'changePassword'])->name('change.password');

    // Logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['checkLogin'])->group(function () {
    // verify email
    Route::get('/send-email', [EmailController::class, 'sendEmailWithCode'])->name('sendEmailWithCode');
    Route::get('/verify/{code}', [EmailController::class, 'verifyCode'])->name('verifyCode');

    // ClubBook
    Route::get('/club/books/{club_id}', [ClubBookController::class, 'getBookClubsByClubId'])->name('club.book');
    Route::get('/club/books/page', [ClubBookController::class, 'showBookListPage'])->name('club.book.page');
    Route::get('/club/book/search/{club_id}/{book_name}', [ClubBookController::class, 'searchClubBooksByName'])
        ->name('club.book.search');

    // book
    Route::get('/book/star/{book_id}', [BookVoteController::class, 'bookStarById'])->name('book.star');
    Route::get('/book/comment/{book_id}', [BookVoteController::class, 'bookCommentByBookId'])->name('book.comment');
    Route::post('/book/vote/create', [BookVoteController::class, 'createBookVote'])->name('book.vote.create');

    // order book
    Route::post('/order/create', [OrderController::class, 'create'])->name('order.create');
    Route::get('/order/list', [OrderController::class, 'showOrderList'])->name('order.list');
    Route::get('/order/get/list/{user_id}', [OrderController::class, 'getOrderByUserId'])->name('order.get.list');
    Route::any('/order/dialog', [OrderController::class, 'showOrderDialog'])->name('order.dialog');
    Route::post('/order/check', [OrderController::class, 'checkOrderOnline'])->name('order.check');

    // User permissions Staff
    Route::middleware(['checkStaff'])->group(function () {
        // Order club
        Route::get('/order/club/list', [OrderController::class, 'getOrderList'])->name('order.get.list.control');

        // Book calendar
        Route::get('/book/calendar', [OrderController::class, 'getBookCalendar'])->name('book.calendar');

        // Club member
        Route::get('/club/member/list', [MemberController::class, 'showMemberListPage'])->name('member.get.list');

        // Member management
        Route::get('/member/detail/{id}', [MemberController::class, 'memberDetail'])->name('member.detail');
        Route::put('/member/update/{id}', [MemberController::class, 'updateMemberDetail'])->name('member.update');
        Route::get('/member/search/{phone_number}', [MemberController::class, 'getMemberByPhoneNumber'])
            ->name('member.search.phone');

        // Club book
        Route::get('/club/book/list', [ClubBookController::class, 'getListBook'])->name('book.get.list');
        Route::get('/club/book/detail/{id}', [ClubBookController::class, 'getClubBookDetail'])
            ->name('club.book.detail');
        Route::any('/club/book/update/{id}', [ClubBookController::class, 'updateClubBookDetail'])
            ->name('club.book.update');
        Route::get('/club/book/add/form', [ClubBookController::class, 'bookAddForm'])->name('book.add.form');
        Route::post('/club/book/add', [ClubBookController::class, 'addNewBook'])->name('book.add');
        Route::get('/club/book/{club_id}', [ClubBookController::class, 'getClubBookByClubId'])
            ->name('club.book.by.clubId');

        // Order Book
        Route::get('/order/confirm/{id}', [OrderController::class, 'orderConfirm'])->name('order.confirm');
        Route::get('/order/return/{id}', [OrderController::class, 'orderReturn'])->name('order.return');
        Route::post('/order/offline/dialog', [OrderController::class, 'orderOfflineDialog'])
            ->name('order.offline.dialog');
        Route::post('/order/offline/create', [OrderController::class, 'orderOfflineCreate'])
            ->name('order.offline.create');
        Route::post('/order/offline/check', [OrderController::class, 'checkOrderOffline'])
            ->name('order.offline.check');
        Route::get('/report', [OrderController::class, 'reportPage'])->name('report.page');
    });
});

// Club
Route::get('/clubs', [ClubController::class, 'showClubListPage'])->name('club.page');

// Book
Route::get('/book/all', [BookController::class, 'getAllBook'])->name('book.all');
Route::get('/book/search/{book_name}', [BookController::class, 'searchBooksByName'])->name('book.search');
Route::get('/book/detail/{id}', [BookController::class, 'bookDetail'])->name('book.detail');

// book calendar
Route::get('list/book/calendar', [OrderController::class, 'getListBookCalendar'])->name('list.book.calendar');
