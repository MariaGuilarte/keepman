<?php

namespace App\Http\Controllers\API;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function index()
    {
      $users = User::all();
      return UserResource::collection($users);
    }

    public function store(Request $request)
    {
      
    }

    public function show(User $user)
    {
      return new UserResource($user);
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        //
    }
}
