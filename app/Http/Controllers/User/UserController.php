<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;

class UserController
{
    //
    public function index()
    {
        $users = User::with(['role' => function ($query) {
            $query->select('id', 'name');
        }])->get()->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role->name,
            ];
        });

        return response()->json([
            'data' => $users
        ], 200);
    }

    public function show(User $user)
    {

        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->role->name
        ], 200);
    }
}
