<?php
namespace App\Http\Controllers;
use App\Models\Cast;
use App\Models\CastMovie;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
class MovieController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $movies = Movie::with('genre')->get();
    return view('movie.index', compact('movies'));
  }
  /**
   * Display the specified resource.
   */
  public function show(Movie $movie)
  {
    $genres = Genre::all(); 
    $casts = Cast::all(); 
    return view('movie.show', compact('movie', 'genres', 'casts'));
  }
  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Movie $movie)
  {
    $genres = Genre::all();
    $casts = Cast::all(); 
    return view('movie.edit', compact('movie', 'genres', 'casts'));
  }
  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Movie $movie)
  {
   
    $posterPath = $movie->poster;
    if ($request->hasFile('poster')) {
      
      if ($posterPath) {
        unlink(storage_path('app/public/' . $posterPath));
      }
      
      $posterPath = $request->file('poster')->store('posters', 'public');
    }
   
    $movie->update([
      'title' => $request->title,
      'synopsis' => $request->synopsis,
      'poster' => $posterPath,
      'year' => $request->year,
      'available' => $request->available,
      'genre_id' => $request->genre_id, 
    ]);
   
    if ($request->has('casts')) {
     
      $movie->casts()->sync($request->casts);
    }
    return redirect()->route('movie.index')->with('success', 'Film berhasil diperbarui!');
  }
  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
   
    $posterPath = null;
    if ($request->hasFile('poster')) {
      $posterPath = $request->file('poster')->store('posters', 'public');
    }
    
    $movie = Movie::create([
      'title' => $request->title,
      'synopsis' => $request->synopsis,
      'poster' => $posterPath,
      'year' => $request->year,
      'available' => $request->available,
      'genre_id' => $request->genre_id, 
    ]);
    
    if ($request->has('casts')) {
      foreach ($request->casts as $castId) {
        CastMovie::create([
          'movie_id' => $movie->id,
          'cast_id' => $castId,
        ]);
      }
    }
    return redirect()->route('movie.index')->with('success', 'Film berhasil ditambahkan!');
  }
  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $genres = Genre::all(); 
    $casts = Cast::all(); 
    return view('movie.create', compact('genres', 'casts'));
  }
  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Movie $movie)
  {
    if ($movie->poster) {
      unlink(storage_path('app/public/' . $movie->poster));
    }
    $movie->delete();
    return redirect()->route('movie.index')->with('success', 'Film berhasil dihapus!');
  }
}