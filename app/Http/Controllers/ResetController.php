<?php

namespace App\Http\Controllers;

use App\Reset;
use App\Counter;
use Illuminate\Http\Request;
use App\Http\Requests\StoreReset;
use App\Http\Requests\UpdateReset;

class ResetController extends Controller
{
  public function index() {
    $resets = Reset::all();
    return view('resets.index', compact($resets));
  }
  
  public function create() {
    return view('resets.create');
  }

  public function store(StoreReset $request){
    $reset = Reset::create([
      'date' => $request->date,
      'counter_id' => $request->counter_id,
      'count' => $request->count
    ]);
    
    if( !$reset->save() ){
      return back()->with('error', 'No se pudo crear el nuevo reset');
    }
    
    return redirect()->route('resets.show', compact($reset))->with('success', '¡Reset registrado!');      
  }

  public function show(Reset $reset) {
    return view('resets.show', compact($reset));
  }

  public function edit(Reset $reset) {
    return view('resets.create');
  }

  public function update(UpdateReset $request, Reset $reset) {
    $reset = $reset->update([
      'date' => ( $request->date ) ? $request->date : $reset->date,
      'counter_id' => ( $request->counter_id ) ? $request->counter_id : $reset->counter_id,
      'count' => ( $request->count ) ? $request->count : $reset->count
    ]);
    
    if( !$reset ){
      return back()->with('error', 'No se pudo actualizar los datos del reset');
    }
    
    return redirect()->route('resets.show', compact($reset))->with('success', '¡Reset actualizado!');      
  }

  public function destroy(Reset $reset) {
    if( !$reset->delete() ){
      return back()->with('error', 'No se pudo eliminar el reset');
    }
    
    return redirect()->route('resets.show', compact($reset))->with('success', '¡Reset eliminado!');
  }
}
