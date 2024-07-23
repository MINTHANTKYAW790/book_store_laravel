<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BackupBinController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PublishingHouseController;
use App\Http\Controllers\PersonController;

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\UnauthorizedPerson;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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
    Route::resource('admin/authors', AuthorController::class)->name('*', 'admin_authors');
    Route::resource('admin/genres', GenreController::class)->name('*', 'admin_genres');
    Route::resource('admin/publishinghouses', PublishingHouseController::class)->name('*', 'admin_publishinghouses');
    Route::resource('admin/books', BookController::class)->name('*', 'admin_books');
    Route::resource('admin/person', UserController::class)->name('*', 'admin_person');
    Route::resource('admin/backup', BackupBinController::class)->name('*', 'admin_backup');
    Route::resource('admin/unauthorized', UnauthorizedPerson::class)->name('*', 'admin_unauthorized');
    Route::resource('admin/positions', PositionController::class)->name('*', 'admin_positions');

    // Our resource routes
    Route::resource('admin/roles', RoleController::class)->name('*', 'roles');
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});
// Explicitly define only the necessary routes for authentication
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('register', [RegisterController::class, 'register'])->name('register');

// Auth::routes();

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
// Password Reset Routes
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
Route::get('/send-test-email', 'EmailController@sendTestEmail');


