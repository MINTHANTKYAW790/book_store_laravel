<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
// use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PublishingHouseController;
use App\Http\Controllers\PersonController;


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

// Route::get('/', function () {
//     return view('guest.books');
// });

Route::middleware('auth')->group(function () {
    Route::resource('/authors', AuthorController::class);
    Route::resource('/genres', GenreController::class);
    Route::resource('/publishinghouses', PublishingHouseController::class);
    Route::resource('/books', BookController::class);
    Route::resource('/person', PersonController::class);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');
Route::get('/guest/detail/{id}', [App\Http\Controllers\WelcomeController::class, 'detail'])->name('detail');
Route::get('/guest/books', [App\Http\Controllers\WelcomeController::class, 'books'])->name('books');
Route::get('/guest/authors', [App\Http\Controllers\WelcomeController::class, 'authors'])->name('authors');
