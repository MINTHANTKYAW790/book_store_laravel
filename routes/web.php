<?php

use App\Http\Controllers\Auth\RegisterController;
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
    Route::resource('/authors', AuthorController::class)->name('*', 'admin_authors');
    Route::resource('/genres', GenreController::class)->name('*', 'admin_genres');
    Route::resource('/publishinghouses', PublishingHouseController::class)->name('*', 'admin_publishinghouses');
    Route::resource('/books', BookController::class)->name('*', 'admin_books');
    Route::resource('/person', PersonController::class)->name('*', 'admin_person');
    Route::get('/books/detail/{id}', [App\Http\Controllers\BookController::class, 'detail'])->name('admin_detail');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');
Route::get('/guest/detail/{id}', [App\Http\Controllers\WelcomeController::class, 'detail'])->name('detail');
Route::get('/guest/authorbooks/{id}', [App\Http\Controllers\WelcomeController::class, 'authorbooks'])->name('authorbooks');
Route::get('/guest/genrebooks/{id}', [App\Http\Controllers\WelcomeController::class, 'genrebooks'])->name('genrebooks');
Route::get('/guest/pbhbooks/{id}', [App\Http\Controllers\WelcomeController::class, 'pbhbooks'])->name('pbhbooks');
Route::get('/guest/books', [App\Http\Controllers\WelcomeController::class, 'books'])->name('ubooks');
Route::get('/guest/authors', [App\Http\Controllers\WelcomeController::class, 'authors'])->name('uauthors');
Route::get('/guest/genres', [App\Http\Controllers\WelcomeController::class, 'genres'])->name('ugenres');
Route::get('/guest/publishinghouses', [App\Http\Controllers\WelcomeController::class, 'publishinghouses'])->name('upublishinghouses');
Route::get('/search', [App\Http\Controllers\WelcomeController::class, 'search'])->name('search');
