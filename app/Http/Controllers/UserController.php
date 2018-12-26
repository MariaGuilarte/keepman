<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;

class UserController extends Controller
{
  public function index() {
    $users = User::all();
    return view('users.index', compact($users));
  }
  
  public function create() {
    return view('users.create');
  }

  public function store(StoreUser $request) {
    $user = User::create([
      'name'      => $request->name,
      'email'      => $request->email,
      'password' => bcrypt( $request->password )
    ]);
    
    if( !$user->save() ){
      return back()->with('error', 'No se pudo crear el nuevo usuario');
    }
    
    return redirect()->route('users.show', compact($user))->with('success', '¡Usuario registrado!');      
  }

  public function show(User $user) {
    return view('users.show', compact($user));
  }

  public function edit(User $user) {
    return view('users.create');
  }

  public function update(UpdateUser $request, User $user) {
    $user = $user->update([
      'name' => ( $request->name ) ? $request->name : $user->name,
      'email' => ( $request->email ) ? $request->email : $user->email,
      'password' => ( $request->password ) ? bcrypt($request->password) : $user->password
    ]);
    
    if( !$user ){
      return back()->with('error', 'No se pudo actualizar los datos del usuario');
    }
    
    return redirect()->route('users.show', compact($user))->with('success', '¡Usuario actualizado!');      
  }

  public function destroy(User $user)
  {
    if( !$user->delete() ){
      return back()->with('error', 'No se pudo eliminar el usuario');
    }
    
    return redirect()->route('users.show', compact($user))->with('success', '¡Usuario eliminado!');
  }
}
