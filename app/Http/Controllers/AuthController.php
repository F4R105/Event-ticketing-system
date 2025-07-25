<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'string|min:3',
            'email' => 'email|unique:users,email',
            'password' => 'string|min:4|confirmed'
        ]);

        $user = User::create($validated);

        Auth::login($user);

        switch ($user->role) {
            case 'admin':
                return redirect('/admin');
            case 'organizer':
                return redirect('/organizer');
            default:
                return redirect('/user');
        }
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        if (!Auth::attempt($validated)) {
            return redirect()->back()->with('status', 'Wrong email or password..');
        };

        switch (Auth::user()->role) {
            case 'admin':
                return redirect('/admin');
            case 'organizer':
                return redirect('/organizer');
            default:
                return redirect('/user');
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::invalidate();
        Session::regenerateToken();

        return redirect('/');
    }
}
