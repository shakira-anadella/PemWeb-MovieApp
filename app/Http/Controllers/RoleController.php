<?php
namespace App\Http\Controllers;
use App\Models\Role;
use Illuminate\Http\Request;
class RoleController extends Controller
{
  
  public function index()
  {
    $roles = Role::all();
    return view('role.index', compact('roles'));
  }
  
  public function store(Request $request)
  {
    Role::create([
      'name' => $request->name,
    ]);
    return redirect()->route('roles.index')->with('success', 'Peran berhasil ditambahkan!');
  }
  
  public function create()
  {
    return view('role.create');
  }
 
  public function show(Role $role)
  {
    return view('role.show', compact('role'));
  }
  
  public function edit(Role $role)
  {
    return view('role.edit', compact('role'));
  }
  
  public function update(Request $request, Role $role)
  {
    $role->update([
      'name' => $request->name,
    ]);
    return redirect()->route('roles.index')->with('success', 'Peran berhasil diperbarui!');
  }
   
  public function destroy(Role $role)
  {
    $role->delete();
    return redirect()->route('roles.index')->with('success', 'Peran berhasil dihapus!');
  }
}