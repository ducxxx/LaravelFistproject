<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ClubBookController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\HomeController;
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
Route::get('/gotohomepage', function () {
    return view('GoToHomePage');
});

//User
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register');

Route::post('/register', [UserController::class, 'register'])->name('user.register');
Route::get('/my-profile', [UserController::class, 'viewMyProfile'])->name('user.profile');
Route::put('/users/update/{id}', [UserController::class, 'update'])->name('user.update');



Route::get('/home', [HomeController::class, 'showHomePage'])->name('homepage');

//Auth

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('user.login');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/change-password', [AuthController::class, 'showChangePasswordForm'])->name('show.change.password');
Route::middleware(['auth'])->group(function () {
    Route::post('/change-password', [AuthController::class, 'changePassword'])->name('change.password');
});
Route::get('/forgot-password', [AuthController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
//Route::post('/logout', [AuthController::class, 'logout'])->name('user.logout');


//Club

//Route::get('/clubs', [ClubController::class, 'showClubListPage'])->name('club.page');
Route::middleware(['checkLogin'])->group(function () {
    // Your routes that require authentication go here
    Route::get('/clubs', [ClubController::class, 'showClubListPage'])->name('club.page');
});

//ClubBook
Route::get('/club/book/all', [ClubBookController::class, 'getClubBooksAll'])->name('club.book.all');
Route::get('/club/books/{club_id}', [ClubBookController::class, 'getBookClubsByClubId'])->name('club.book');
Route::get('/club/books/page', [ClubBookController::class, 'showBookListPage'])->name('club.book.page');
Route::get('/club/book/search/{club_id}/{book_name}', [ClubBookController::class, 'searchClubBooksByName'])->name('club.book.search');

//Book
Route::get('/book/all', [BookController::class, 'getAllBook'])->name('book.all');
Route::get('/book/search/{book_name}', [BookController::class, 'searchBooksByName'])->name('book.search');

//Order
Route::post('/order/create', [OrderController::class, 'create'])->name('order.create');
Route::get('/order/list', [OrderController::class, 'showOrderList'])->name('order.list');
Route::middleware(['checkLogin'])->group(function () {
    // Your routes that require authentication go here
    Route::get('/order/get/list/{user_id}', [OrderController::class, 'getOrderByUserId'])->name('order.get.list');
});
Route::get('/order/dialog', [OrderController::class, 'showOrderDialog'])->name('order.dialog');



