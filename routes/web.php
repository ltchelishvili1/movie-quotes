<?php

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
Route::get('movies/{movie}', [MovieController::class, 'show'])->name('movies.show');

Route::group(['prefix' => 'user'], function () {
	Route::middleware(['guest'])->group(function () {
		Route::get('login', [LoginController::class, 'index'])->name('login');
		Route::post('login', [LoginController::class, 'login'])->name('login.store');
	});
	Route::get('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
});

Route::get('switchlang/{language}', [LanguageController::class, 'changeLang'])->name('lang.change');
