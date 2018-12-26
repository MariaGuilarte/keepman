<?php

namespace App\Http\Controllers\API;

use App\Reset;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ResetResource;

class ResetController extends Controller
{
    public function index()
    {
      $resets = Reset::all();
      return ResetResource::collection($resets);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Reset $reset)
    {
      return new ResetResource($reset);
    }

    public function update(Request $request, Reset $reset)
    {
        //
    }

    public function destroy(Reset $reset)
    {
        //
    }
}
