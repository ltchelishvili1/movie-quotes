<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\SessionController;
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

Route::get('login', [SessionController::class, 'create'])->name('login')->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->name('login.store')->middleware('guest');

Route::get('logout', [SessionController::class, 'destroy'])->name('logout')->middleware('auth');

Route::get('lang/{lang}', [LanguageController::class, 'changeLang'])->name('lang.change');
