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
Route::middleware(['guest'])->group(function () {
	Route::controller(LoginController::class)->group(function () {
		Route::get('/login', 'index')->name('login.index');
		Route::post('/login', 'login')->name('login');
	});
});
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('set-language/{language}', [LanguageController::class, 'setLanguage'])->name('set-language');

Route::group(['middleware' => ['auth']], function () {
	Route::controller(AdminMovieController::class)->group(function () {
		Route::get('admin/movies', 'index')->name('adminpanel');
		Route::get('admin/movies/create', 'create')->name('movies.create');
		Route::post('admin/movies', 'store')->name('movies.store');
		Route::get('admin/movies/{movie}/edit', 'edit')->name('movies.edit');
		Route::patch('admin/movies/{movie}', 'update')->name('movies.update');
		Route::delete('admin/movies/{movie}', 'destroy')->name('movies.delete');
	});

	Route::controller(AdminQuoteController::class)->group(function () {
		Route::get('admin/quotes/', 'index')->name('adminquotes');
		Route::get('admin/quotes/create', 'create')->name('quotes.create');
		Route::post('admin/quotes/', 'store')->name('quotes.store');
		Route::get('admin/quotes/{quote}/edit', 'edit')->name('quotes.edit');
		Route::patch('admin/quotes/{quote}', 'update')->name('quotes.update');
		Route::delete('admin/quotes/{quote}', 'destroy')->name('quotes.delete');
	});
});
