<?php

namespace App\Http\Controllers;

use App\Mail\EventBooked;
use App\Models\Booking;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function index()
    {
        return view('booking.index');
    }

    public function create(Event $event)
    {
        return view('booking.create', ['event' => $event]);
    }

    public function store(Request $request)
    {
        $event = Event::findOrFail($request->event_id);
        $availableTickets = $event->available_tickets;

        if($availableTickets < 1){
            return redirect()->back()->with('error','No available tickets');
        }

        $validated = $request->validate([
            'quantity' => ['required', 'integer', 'min:1', 'max:' . $availableTickets],
            'event_id' => ['required', 'exists:events,id'],
        ]);

        $validated['user_id'] = Auth::user()->id;
        $validated['total_price'] = $validated['quantity'] * $event->ticket_price;

        Booking::create($validated);

        $event->decrement('available_tickets', $validated['quantity']);

        Mail::to(Auth::user()->email)->send(new EventBooked($event));

        return redirect('/bookings');
    }
}
