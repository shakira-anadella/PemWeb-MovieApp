<?php
namespace App\Http\Controllers;
use App\Models\Movie;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
class ReviewController extends Controller
{
  
  public function index()
  {
    $reviews = Review::with(['user', 'movie'])->get();
    return view('review.index', compact('reviews'));
  }

  public function store(Request $request)
  {
    Review::create($request->all());
    return redirect()->route('reviews.index')->with('success', 'Ulasan berhasil dibuat.');
  }

  public function create()
  {
    $movies = Movie::all();
    $users = User::all();
    return view('review.create', compact('movies', 'users'));
  }

  public function show(Review $review)
  {
    $review->load('user', 'movie'); 
    return view('review.show', compact('review'));
  }
  
  public function edit(Review $review)
  {
    $movies = Movie::all(); 
    $users = User::all();   
    return view('review.edit', compact('review', 'movies', 'users'));
  }
  
  public function update(Request $request, Review $review)
  {
    $review->update($request->all());
    return redirect()->route('reviews.index')->with('success', 'Ulasan berhasil diperbarui.');
  }
  
  public function destroy(Review $review)
  {
    $review->delete();
    return redirect()->route('reviews.index')->with('success', 'Ulasan berhasil dihapus.');
  }
}