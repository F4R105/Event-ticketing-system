<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{

    public function view()
    {
        $user = User::where('id', Auth::id())->whereNull('business_name')->first();
        $status = $user ? 'not sent' : 'sent';
        return view('user.organizer-request', ['status' => $status]);
    }

    public function request(Request $request)
    {
        $validated = $request->validate(['business_name' => 'required|string']);

        $user = User::findOrFail(Auth::id());

        $user->update(['business_name' => $validated['business_name']]);

        return redirect()->back();
    }

    public function requests()
    {
        $requests = User::where('role', 'user')->whereNotNull('business_name')->latest()->with('bookings')->get();
        return view('admin.user-requests', ['requests' => $requests]);
    }

    public function organizers()
    {
        $organizers = User::where('role', 'organizer')->latest()->with('events')->get();
        return view('admin.organizers', ['organizers' => $organizers]);
    }

    public function approve(Request $request)
    {
        $validated = $request->validate(['user_id' => 'required|integer|exists:users,id']);
        $user = User::findOrFail($validated['user_id']);
        $user->update(['role' => 'organizer']);
        
        $organizers = User::where('role', 'organizer')->latest()->with('events')->get();
        return view('admin.organizers', ['organizers' => $organizers]);
    }
}
