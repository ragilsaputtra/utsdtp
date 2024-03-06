<?php

// use App\Http\Controllers\AuthorController;

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/book', [BookController::class, 'index'])->name('book.index');
route::get('/book/show/{id}', [BookController::class, 'show'])->name('book.show');
Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
Route::post('/book/store', [BookController::class, 'store'])->name('book.store');
Route::get('/book/edit/{id}', [BookController::class, 'edit'])->name('book.edit');
Route::put('/book/update/{id}', [BookController::class, 'update'])->name('book.update');
Route::delete('/book/{id}/delete', [BookController::class, 'destroy'])->name('book.destroy');
// route::get('/book', [BookController::class, 'create'])

Route::get('/author', [AuthorController::class, 'index'])->name('author.index');
route::get('/author/show/{id}', [AuthorController::class, 'show'])->name('author.show');
Route::get('/author/create', [AuthorController::class, 'create'])->name('author.create');
Route::post('/author/store', [AuthorController::class, 'store'])->name('author.store');
Route::get('/author/edit/{id}', [AuthorController::class, 'edit'])->name('author.edit');
Route::put('/author/update/{id}', [AuthorController::class, 'update'])->name('author.update');
Route::delete('/author/{id}/delete', [AuthorController::class, 'destroy'])->name('author.destroy');

Route::get('/publisher', [PublisherController::class, 'index'])->name('publisher.index');
route::get('/publisher/show/{id}', [PublisherController::class, 'show'])->name('publisher.show');
Route::get('/publisher/create', [PublisherController::class, 'create'])->name('publisher.create');
Route::post('/publisher/store', [PublisherController::class, 'store'])->name('publisher.store');
Route::get('/publisher/edit/{id}', [PublisherController::class, 'edit'])->name('publisher.edit');
Route::put('/publisher/update/{id}', [PublisherController::class, 'update'])->name('publisher.update');
Route::delete('/publisher/{id}/delete', [PublisherController::class, 'destroy'])->name('publisher.destroy');

Route::get('/dashboard',[BookController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::controller(BookController::class)->group(function() {
    Route::get('/search/', 'search')->name('search');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
