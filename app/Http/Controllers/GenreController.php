<?php
namespace App\Http\Controllers;
use App\Models\Genre;
use Illuminate\Http\Request;
class GenreController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {

    $genres = Genre::all();
    return view('genre.index', compact('genres'));
  }
  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    // Create a new genre without validation
    Genre::create($request->all());
    return redirect()->route('genre.index')->with('success', 'Genre berhasil dibuat');
  }
  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('genre.create');
  }
  /**
   * Display the specified resource.
   */
  
  public function destroy(Genre $genre)
  {
    
    $genre->delete();
    return redirect()->route('genre.index')->with('success', 'Genre berhasil dihapus');
  }
}