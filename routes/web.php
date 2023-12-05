<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClubBookController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\HomeController;
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

Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register');

Route::post('/register', [UserController::class, 'register'])->name('user.register');



Route::get('/home', [HomeController::class, 'showHomePage'])->name('homepage');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('user.login');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//Route::post('/logout', [AuthController::class, 'logout'])->name('user.logout');

//Club

//Route::get('/clubs', [ClubController::class, 'showClubListPage'])->name('club.page');
Route::middleware(['checkLogin'])->group(function () {
    // Your routes that require authentication go here
    Route::get('/clubs', [ClubController::class, 'showClubListPage'])->name('club.page');
});

//ClubBook

Route::get('/club/books/{club_id}', [ClubBookController::class, 'getBookClubsByClubId'])->name('club.book');
Route::get('/club/books/all', [ClubBookController::class, 'getClubBooksAll'])->name('club.book.all');
Route::get('/club/books/page', [ClubBookController::class, 'showBookListPage'])->name('club.book.page');


