<?php
namespace App\Http\Controllers;
use App\Models\Cast;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
class CastController extends Controller
{
  /**
   * Display a listing of the Cast records.
   *
   * @return View
   */
  public function index()
  {
   
    $casts = Cast::all();
    return view('cast.index', compact('casts')); 
  }
  /**
   * Display the specified Cast record.
   *
   * @param Cast $cast
   * @return View
   */
  public function show(Cast $cast)
  {
    return view('cast.show', compact('cast')); 
  }
  /**
   * Show the form for editing the specified Cast record.
   *
   * @param Cast $cast
   * @return View
   */
  public function edit(Cast $cast)
  {
    return view('cast.edit', compact('cast'));  
  }
  /**
   * Update the specified Cast record in the database.
   *
   * @param Request $request
   * @param Cast $cast
   * @return RedirectResponse
   */
  public function update(Request $request, Cast $cast)
  {
   
    if ($request->hasFile('avatar')) {
    
      Storage::delete('public/' . $cast->avatar);
      
      $avatarPath = $request->file('avatar')->store('avatars', 'public');
      $cast->avatar = $avatarPath;
    }
   
    $cast->update([
      'name' => $request->name,
      'age' => $request->age,
      'biodata' => $request->biodata,
    ]);
    
    return redirect()->route('casts.index')->with('success', 'Pemeran berhasil diperbarui!');
  }
  /**
   * Store a newly created Cast record in the database.
   *
   * @param Request $request
   * @return RedirectResponse
   */
  public function store(Request $request)
  {
   
    $avatarPath = $request->file('avatar')->store('avatars', 'public');
    
    Cast::create([
      'name' => $request->name,
      'age' => $request->age,
      'biodata' => $request->biodata,
      'avatar' => $avatarPath,  
    ]);
   
    return redirect()->route('casts.index')->with('success', 'Pemeran berhasil ditambahkan!');
  }
  /**
   * Show the form for creating a new Cast record.
   *
   * @return View
   */
  public function create()
  {
    return view('cast.create'); 
  }
  /**
   * Remove the specified Cast record from the database.
   *
   * @param Cast $cast
   * @return RedirectResponse
   */
  public function destroy(Cast $cast)
  {
   
    Storage::delete('public/' . $cast->avatar);
    
    $cast->delete();
   
    return redirect()->route('casts.index')->with('success', 'Pemeran berhasil dihapus!');
  }
}