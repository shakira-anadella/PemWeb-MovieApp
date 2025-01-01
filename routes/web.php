<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ReviewController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//Route::redirect("/", "/home");
Route::get('/home', [DashboardController::class, 'home'])->name('home');
//Route::resource('/movies', MovieController::class);

Route::redirect("/", "/movie");

Route::get('/movie', [MovieController::class, 'index'])->name('movie.index');
Route::get('/movie/create', [MovieController::class, 'create'])->name('movie.create');
Route::post('/movie', [MovieController::class, 'store'])->name('movie.store');
Route::get('/movie', [MovieController::class, 'index'])->name('movie.index');

Route::redirect("/", "/genre");

Route::get('/genre', [GenreController::class, 'index'])->name('genre.index');
Route::get('/genre/create', [GenreController::class, 'create'])->name('genre.create');
Route::post('/genre', [GenreController::class, 'store'])->name('genre.store');
Route::get('/genre/{genre}', [GenreController::class, 'show'])->name('genre.show');

Route::redirect("/", "/review");

Route::get('/review', [ReviewController::class, 'index'])->name('review.index');
Route::get('/review/create', [ReviewController::class, 'create'])->name('review.create');
Route::post('/review', [ReviewController::class, 'store'])->name('review.store');
Route::get('/review/{review}', [ReviewController::class, 'show'])->name('review.show');
