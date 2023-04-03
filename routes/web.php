<?php

use App\Http\Controllers\Admin\AdminMovieController;
use App\Http\Controllers\Admin\AdminQuoteController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\LoginController;
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
Route::get('/', [QuoteController::class, 'index'])->name('home');
Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movies.show');
Route::group(['prefix' => 'user'], function () {
	Route::middleware(['guest'])->group(function () {
		Route::get('/login', [LoginController::class, 'index'])->name('login.index');
		Route::post('/login', [LoginController::class, 'login'])->name('login');
	});
	Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
});
Route::get('set-language/{language}', [LanguageController::class, 'setLanguage'])->name('set-language');
Route::middleware(['auth'])->group(function () {
	Route::group(['prefix' => 'admin/movies'], function () {
		Route::get('/', [AdminMovieController::class, 'index'])->name('adminpanel');
		Route::post('/', [AdminMovieController::class, 'store'])->name('movies.store');
		Route::patch('/{movie}', [AdminMovieController::class, 'update'])->name('movies.update');
		Route::delete('/{movie}', [AdminMovieController::class, 'destroy'])->name('movies.delete');
		Route::get('/{movie}/edit', [AdminMovieController::class, 'edit'])->name('movies.edit');
		Route::get('/create', [AdminMovieController::class, 'create'])->name('movies.create');
	});

	Route::group(['prefix' => 'admin/movies/{movie}/quotes'], function () {
		Route::get('/', [AdminQuoteController::class, 'index'])->name('adminquotes');
		Route::get('/create', [AdminQuoteController::class, 'create'])->name('quotes.create');
		Route::post('/', [AdminQuoteController::class, 'store'])->name('quotes.store');
		Route::delete('/{quote}', [AdminQuoteController::class, 'destroy'])->name('quotes.delete');
		Route::get('/{quote}/edit', [AdminQuoteController::class, 'edit'])->name('quotes.edit');
		Route::patch('/{quote}', [AdminQuoteController::class, 'update'])->name('quotes.update');
	});
});
