<?php

namespace App\Http\Controllers;

use App\Counter;
use App\Reset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCounter;
use App\Http\Requests\UpdateCounter;

class CounterController extends Controller
{  
  public function index()
  {
    $counters = Counter::where('id', Auth::id());
    // return view('counters.index', compact($counters));
    dd($counters);
  }
  
  public function create()
  {
    return view('counters.create');
  }

  public function store(StoreCounter $request)
  {
    $counter = Counter::create([
      'title'      => $request->title,
      'color'      => $request->color,
      'start_date' => $request->start_date,
      'status'     => $request->status,
      'user_id'    => Auth::id()
    ]);
    
    if( !$counter->save() ){
      return back()->with('error', 'No se pudo crear el nuevo contador');
    }
    
    return redirect()->route('counters.show', compact($counter))->with('success', '¡Contador registrado!');      
  }

  public function show(Counter $counter)
  {
    // return view('counters.show', ['counter' => $counter]);
    dd($counter);
  }

  public function edit(Counter $counter)
  {
    return view('counters.create');
  }

  public function update(UpdateCounter $request, Counter $counter)
  {
    $counter = $counter->update([
      'title' => ( $request->title ) ? $request->title : $counter->title,
      'start_date' => ( $request->start_date ) ? $request->start_date : $counter->start_date,
      'color' => ( $request->color ) ? $request->color : $counter->color,
      'status' => ( $request->status ) ? $request->status : $counter->status
    ]);
    
    if( !$counter ){
      return back()->with('error', 'No se pudo actualizar los datos del contador');
    }
    
    return redirect()->route('counters.show', compact($counter))->with('success', '¡Contador actualizado!');      
  }

  public function destroy(Counter $counter)
  {
    if( !$counter->delete() ){
      return back()->with('error', 'No se pudo eliminar el contador');
    }
    
    return redirect()->route('counters.show', compact($counter))->with('success', '¡Contador eliminado!');
  }
}
