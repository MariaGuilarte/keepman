<?php

namespace App\Http\Controllers\API;

use App\Counter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CounterResource;

class CounterController extends Controller
{
    public function index()
    {
      $counters = Counter::all();
      return CounterResource::collection($counters);
    }

    public function store(Request $request)
    {
      $counter       = Counter::create([
        'title'      => $request->title,
        'color'      => $request->color,
        'start_date' => $request->start_date,
        'status'     => $request->status,
        'user_id'    => Auth::id()
      ]);
      
      if( !$counter->save() ){
        return response('No se pudo crear el nuevo contador', 500)->header('Content-Type', 'text/plain');
      }
      
      return response('¡Contador creado exitosamente!', 200)->header('Content-Type', 'text/plain');
    }

    public function show(Counter $counter)
    {
      return new CounterResource($counter);
    }

    public function update(Request $request, Counter $counter)
    {
      $counter = $counter->update([
        'title' => ( $request->title ) ? $request->title : $counter->title,
        'start_date' => ( $request->start_date ) ? $request->start_date : $counter->start_date,
        'color' => ( $request->color ) ? $request->color : $counter->color,
        'status' => ( $request->status ) ? $request->status : $counter->status
      ]);
      
      if( !$counter ){
        return response('No se pudo actualizar el contador', 500)->header('Content-Type', 'text/plain');
      }
      
      return response('¡Contador actualizado exitosamente!', 200)->header('Content-Type', 'text/plain');
    }

    public function destroy(Counter $counter)
    {
      if( !$counter->delete() ){
         return response('No puedes eliminar este counter', 403)
                        ->header('Content-Type', 'text/plain');
      }
      
     return response('¡Eliminación exitosa!', 200)->header('Content-Type', 'text/plain');
    }
}
