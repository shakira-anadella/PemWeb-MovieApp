<?php
namespace App\Http\Controllers;
use App\Models\Genre;
use Illuminate\Http\Request;
class GenreController extends Controller
{
  
  public function index()
  {
    
    $genres = Genre::all();
    return view('genre.index', compact('genres'));
  }
  
  public function store(Request $request)
  {
    
    Genre::create($request->all());
    return redirect()->route('genre.index')->with('success', 'Genre berhasil dibuat');
  }
  
  public function create()
  {
    return view('genre.create');
  }
  
  public function show(Genre $genre)
  {
    return view('genre.show', compact('genre'));
  }
  
  public function edit(Genre $genre)
  {
    return view('genre.edit', compact('genre'));
  }
  
  public function update(Request $request, Genre $genre)
  {
    
    $genre->update($request->all());
    return redirect()->route('genre.index')->with('success', 'Genre berhasil diperbarui');
  }
  
  public function destroy(Genre $genre)
  {
   
    $genre->delete();
    return redirect()->route('genre.index')->with('success', 'Genre berhasil dihapus');
  }
}