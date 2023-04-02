<?php

use App\Http\Controllers\AdminMovieController;
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

Route::group(['prefix' => 'admin/movies'], function () {
	Route::middleware(['auth'])->group(function () {	
		Route::get('/', [AdminMovieController::class, 'index'])->name('adminpanel');
		Route::post('/', [AdminMovieController::class, 'store'])->name('movie.store');
		Route::patch('/{movie}', [AdminMovieController::class, 'update'])->name('movie.update');
		Route::delete('/{movie}', [AdminMovieController::class, 'destroy'])->name('movie.delete');
		Route::get('/{movie}/edit', [AdminMovieController::class, 'edit'])->name('movie.edit');
		Route::get('/create', [AdminMovieController::class, 'create'])->name('movie.create');
		
	});
});

