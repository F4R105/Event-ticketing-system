<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());
        $token = $user->createToken()->plainTextToken;
        return response()->json(compact('user', 'token'));
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            $user = Auth::user();
            $token = $user->createToken('main')->plainTextToken;
            return response()->json(compact('user', 'token'));
        }

        return response()->json(['errors' => ["email" => ["Wrong email or password"]]]);
    }


    public function logout()
    {
        Auth::logout();
        Session::invalidate();
        Session::regenerateToken();

        return response()->json(['message' => "User logged out"]);
    }
}
