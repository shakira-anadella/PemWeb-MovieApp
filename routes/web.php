<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MovieController;


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
Route::get('/movie/{id}', [MovieController::class, 'show'])->name('movie.show');
Route::put('/movie/{movie}', [MovieController::class, 'update'])->name('movie.update');
Route::get('/movie', [MovieController::class, 'index'])->name('movie.index');