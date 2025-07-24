<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::where('user_id', Auth::user()->id);
        return view('booking.index', ['bookings' => $bookings]);
    }

    public function create(Event $event)
    {
        return view('booking.create', ['event' => $event]);
    }

    public function store(Request $request)
    {
        $event = Event::findOrFail($request->event_id);
        $availableTickets = $event->available_tickets;

        $validated = $request->validate([
            'quantity' => ['required', 'integer', 'min:1', 'max:' . $availableTickets],
            'event_id' => ['required', 'exists:events,id'],
        ]);

        $validated['user_id'] = Auth::user()->id;
        $validated['total_price'] = $validated['quantity'] * $event->ticket_price;

        Booking::create($validated);

        $event->decrement('available_tickets', $validated['quantity']);

        return redirect('/bookings');
    }
}
