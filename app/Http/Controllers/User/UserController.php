<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;

class UserController
{
    //
    public function index()
    {
        $users = User::all();

        return response()->json([
            'data' => $users
        ], 200);
    }

    public function show(User $user)
    {
        return response()->json([
            'data' => $user
        ], 200);
    }
}
