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

Route::group(['prefix' => 'admin/movies', 'middleware' => ['auth']], function () {
	Route::controller(AdminMovieController::class)->group(function () {
		Route::get('/', 'index')->name('adminpanel');
		Route::post('/', 'store')->name('movies.store');
		Route::patch('/{movie}', 'update')->name('movies.update');
		Route::delete('/{movie}', 'destroy')->name('movies.delete');
		Route::get('/{movie}/edit', 'edit')->name('movies.edit');
		Route::get('/create', 'create')->name('movies.create');
	});
});

Route::group(['prefix' => 'admin/movies/{movie}/quotes', 'middleware' => ['auth']], function () {
	Route::controller(AdminQuoteController::class)->group(function () {
		Route::get('/', 'index')->name('adminquotes');
		Route::get('/create', 'create')->name('quotes.create');
		Route::post('/', 'store')->name('quotes.store');
		Route::delete('/{quote}', 'destroy')->name('quotes.delete');
		Route::get('/{quote}/edit', 'edit')->name('quotes.edit');
		Route::patch('/{quote}', 'update')->name('quotes.update');
	});
});
