<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Mail\ResetPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {

        $user = User::create($request->validated());

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

    public function login(LoginRequest $request)
    {

        if (!Auth::attempt($request->validated())) {
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

    public function sendResetPasswordLink(Request $request)
    {
        $request->validate(
            ['email' => ['required']]
        );

        $user = User::findOrFail('email', $request->only('email'));


        Mail::to($request->only('email'))->send(
            new ResetPassword($link)
        );

        return redirect()->back()->with('status', 'Reset password link is sent to your email');
    }

    public function editPassword(User $user)
    {
        return view('guest.reset-password', ['user' => $user]);
    }

    public function udpatePassword(Request $request)
    {
        return redirect()->back()->with('status', "Password for $request->user_id is updated");
    }
}
