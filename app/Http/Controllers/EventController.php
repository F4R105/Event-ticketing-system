<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'venue' => 'required|string',
            'details' => 'string',
            'event_date' => 'required|date|after:now',
            'ticket_price' => 'required|integer',
            'available_tickets' => 'required|integer',
            'booking_start_date' => 'required|date|after:date',
            'booking_deadline_date' => 'required|date|after:date'
        ]);

        Event::create($validated);

        switch (Auth::user()->role) {
            case 'admin':
                return redirect('/admin');
            case 'organizer':
                return redirect('/organizer');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
