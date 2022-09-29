<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUserById(Request $request)
    {
        return User::find($request->id);
    }

    public function addUser(Request $request)
    {
        $newUser = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|min:8|max:50',
        ]);
        $newUser['password'] = bcrypt($newUser['password']);
        // data in request is valid
        User::create($newUser);

        return User::where('email', $newUser['email'])->first();
    }

    public function switchEnvironment(Request $request)
    {
        User::find($request->id)->update(['current_env' => $request->env]);

        return User::find($request->id);
    }
}
