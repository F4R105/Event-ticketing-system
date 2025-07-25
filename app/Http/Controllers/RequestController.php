<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{

    public function view()
    {
        $user = User::where('user_id', Auth::id())->whereNull('business_name')->get();
        $status = $user ? 'sent' : 'not sent';
        return view('user.organizer-request', ['status' => $status]);
    }

    public function request(Request $request)
    {
        $validated = $request->validate(['business_name' => 'required|string']);

        $user = User::findOrFail(Auth::id());

        $user->update(['business_name' => $validated['business_name']]);

        return redirect()->back();
    }
}
