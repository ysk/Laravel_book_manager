<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\MypageController;


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

Route::get('/', [BooksController::class, 'index'])->name('books.index');
Route::get('/show/{id}', [BooksController::class, 'show'])->name('book.show');

Route::middleware('auth')->group(function () {

    Route::prefix('books')->group(function () {        
        Route::get('/create', [BooksController::class, 'create'])->name('book.create');
        Route::post('/store', [BooksController::class, 'store'])->name('book.store');
        Route::get('/edit/{id}', [BooksController::class, 'edit'])->name('book.edit');
        Route::post('/update/{id}', [BooksController::class, 'update'])->name('book.update');
        Route::post('/destroy/{id}', [BooksController::class, 'destroy'])->name('book.destroy');
    });
    Route::prefix('mypage')->group(function () {
        Route::get('/show/{id}', [MypageController::class, 'show'])->name('profile.show');
    });
});

