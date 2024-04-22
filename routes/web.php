<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

// 公開ページ
Route::get('/', [BooksController::class, 'index'])->name('books.index');
Route::get('/books/show/{id}', [BooksController::class, 'show'])->name('book.show');
Route::get('/books/search', [SearchController::class, 'searchQuery'])->name('search.result');

Route::middleware('auth')->group(function () {
    // 本棚管理
    Route::prefix('books')->group(function () {        
        Route::get('/create', [BooksController::class, 'create'])->name('book.create');
        Route::post('/store', [BooksController::class, 'store'])->name('book.store');
        Route::get('/edit/{id}', [BooksController::class, 'edit'])->name('book.edit');
        Route::post('/update/{id}', [BooksController::class, 'update'])->name('book.update');
        Route::post('/destroy/{id}', [BooksController::class, 'destroy'])->name('book.destroy');
    });
    // ユーザー管理
    Route::prefix('mypage')->group(function () {
        Route::get('/show/{id}', [UserController::class, 'show'])->name('profile.show');
    });
});

// その他静的ページ
Route::get('/privacy', [PageController::class, 'privacy'])->name('page.privacy');
Route::get('/profile', [PageController::class, 'profile'])->name('page.profile');
Route::get('/contact', [PageController::class, 'contact'])->name('page.contact');

