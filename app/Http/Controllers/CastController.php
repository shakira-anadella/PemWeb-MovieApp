<?php
namespace App\Http\Controllers;
use App\Models\Cast;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
class CastController extends Controller
{
  
  public function index()
  {
    
    $casts = Cast::all();
    return view('casts.index', compact('casts'));  
  }
 
  public function show(Cast $cast)
  {
    return view('casts.show', compact('cast'));  
  }
 
  public function edit(Cast $cast)
  {
    return view('casts.edit', compact('cast'));  
  }
  
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
 
  public function create()
  {
    return view('casts.create');  
  }
 
  public function destroy(Cast $cast)
  {
   
    Storage::delete('public/' . $cast->avatar);
    
    $cast->delete();
   
    return redirect()->route('casts.index')->with('success', 'Pemeran berhasil dihapus!');
  }
}