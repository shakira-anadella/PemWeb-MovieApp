<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
  /**
   * Tampilkan daftar ulasan.
   */
  public function index()
  {
    $reviews = Review::with(['user', 'movie'])->get();
    return view('review.index', compact('reviews'));
  }

  /**
   * Simpan ulasan baru ke dalam penyimpanan.
   */
  public function store(Request $request)
  {
    Review::create($request->all());

    return redirect()->route('reviews.index')->with('success', 'Ulasan berhasil dibuat.');
  }

  /**
   * Tampilkan formulir untuk membuat ulasan baru.
   */
  public function create()
  {
    $movies = Movie::all();
    $users = User::all();
    return view('review.create', compact('movies', 'users'));
  }

  /**
   * Tampilkan ulasan yang dipilih.
   */

  public function destroy(Review $review)
  {
    $review->delete();

    return redirect()->route('reviews.index')->with('success', 'Ulasan berhasil dihapus.');
  }
}
