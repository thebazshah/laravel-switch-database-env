<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function token(Request $request)
    {
        $creds = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        ]);

        if (! Auth::attempt($creds)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $user = auth()->user();

        // following line removes itellisense error
        /** @var \App\Models\User $user */
        $token = $user->createToken($request->userAgent().'_'.$request->ip());

        return response([
            'token' => $token->plainTextToken,
            'user' => $user,
        ]);
    }
}
