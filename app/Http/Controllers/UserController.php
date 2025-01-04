<?php
namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
class UserController extends Controller
{
  /**
   * Display a listing of users.
   *
   * @return View
   */
  public function index(): View
  {
    
    $users = User::with(['role', 'profile'])->get();
    return view('user.index', compact('users'));  
  }
  
  public function show(User $user): View
  {
    
    $user->load('profile');
    return view('user.show', compact('user'));  
  }
  
  public function edit(User $user): View
  {
    
    $roles = Role::all();
    $user->load('profile');  
    return view('user.edit', compact('user', 'roles'));  
  }
 
  public function update(Request $request, User $user): RedirectResponse
  {
    
    $user->update([
      'name' => $request->name,
      'email' => $request->email,
      'password' => $request->password ? Hash::make($request->password) : $user->password,  
      'role_id' => $request->role_id,
    ]);
   
    $avatarPath = $user->profile->avatar;  
    if ($request->hasFile('avatar')) {
      
      if ($avatarPath && Storage::disk('public')->exists($avatarPath)) {
        Storage::disk('public')->delete($avatarPath);
      }
      
      $avatarPath = $request->file('avatar')->store('avatars', 'public');
    }
   
    $user->profile()->update([
      'biodata' => $request->biodata,
      'age' => $request->age,
      'address' => $request->address,
      'avatar' => $avatarPath,  
    ]);
   
    return redirect()->route('users.index')->with('success', 'Pengguna berhasil diperbarui!');
  }
 
  public function store(Request $request): RedirectResponse
  {
    
    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'role_id' => $request->role_id,
    ]);
    
    $avatarPath = null;
    if ($request->hasFile('avatar')) {
      $avatarPath = $request->file('avatar')->store('avatars', 'public');  
    }
    
    $user->profile()->create([
      'biodata' => $request->biodata,
      'age' => $request->age,
      'address' => $request->address,
      'avatar' => $avatarPath,  
    ]);
    
    return redirect()->route('users.index')->with('success', 'Pengguna berhasil ditambahkan!');
  }
  
  public function create(): View
  {
   
    $roles = Role::all();
    return view('user.create', compact('roles'));  
  }
  
  public function destroy(User $user): RedirectResponse
  {
    
    $avatarPath = $user->profile->avatar;
    if ($avatarPath && Storage::disk('public')->exists($avatarPath)) {
      Storage::disk('public')->delete($avatarPath);
    }
    
    $user->profile()->delete();
    
    $user->delete();
    
    return redirect()->route('users.index')->with('success', 'Pengguna berhasil dihapus!');
  }
}