<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CastController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

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

//Route::get('/home', [DashboardController::class, 'home'])->name('home');

Route::redirect("/", "/movie");

Route::get('/movie', [MovieController::class, 'index'])->name('movie.index');
Route::get('/movie/create', [MovieController::class, 'create'])->name('movie.create');
Route::post('/movie', [MovieController::class, 'store'])->name('movie.store');
Route::get('/movie/{movie}/edit', [MovieController::class, 'edit'])->name('movie.edit');
Route::put('/movie/{movie}', [MovieController::class, 'update'])->name('movie.update');
Route::delete('/movie/{movie}', [MovieController::class, 'destroy'])->name('movie.destroy');

Route::redirect("/", "/genre");

Route::get('/genre', [GenreController::class, 'index'])->name('genre.index');
Route::get('/genre/create', [GenreController::class, 'create'])->name('genre.create');
Route::post('/genre', [GenreController::class, 'store'])->name('genre.store');
Route::get('/genre/{genre}', [GenreController::class, 'show'])->name('genre.show');
Route::get('/genre/{genre}/edit', [GenreController::class, 'edit'])->name('genre.edit');
Route::put('/genre/{genre}', [GenreController::class, 'update'])->name('genre.update');
Route::delete('/genre/{genre}', [GenreController::class, 'destroy'])->name('genre.destroy');

Route::redirect("/", "/review");

Route::get('/review', [ReviewController::class, 'index'])->name('review.index');
Route::get('/review/create', [ReviewController::class, 'create'])->name('review.create');
Route::post('/review', [ReviewController::class, 'store'])->name('review.store');
Route::get('/review/{review}', [ReviewController::class, 'show'])->name('review.show');
Route::get('/review/{review}/edit', [ReviewController::class, 'edit'])->name('review.edit');
Route::put('/review/{review}', [ReviewController::class, 'update'])->name('review.update');
Route::delete('/review/{review}', [ReviewController::class, 'destroy'])->name('review.destroy');

Route::redirect("/", "/casts");

Route::get('/casts', [CastController::class, 'index'])->name('casts.index');
Route::get('/casts/create', [CastController::class, 'create'])->name('casts.create');
Route::post('/casts', [CastController::class, 'store'])->name('casts.store');
Route::get('/casts/{cast}', [CastController::class, 'show'])->name('casts.show');
Route::get('/casts/{cast}/edit', [CastController::class, 'edit'])->name('casts.edit');
Route::put('/casts/{cast}', [CastController::class, 'update'])->name('casts.update');
Route::delete('/casts/{cast}', [CastController::class, 'destroy'])->name('casts.destroy');

Route::redirect("/", "/roles");

Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
Route::get('/roles/{role}', [RoleController::class, 'show'])->name('roles.show');
Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
Route::put('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');
Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');

Route::redirect("/", "/users");

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
