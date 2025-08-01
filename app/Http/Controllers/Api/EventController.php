<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditEventRequest;
use App\Http\Requests\StoreEventRequest;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $now = Carbon::now();

        $events = Event::where('booking_start_date', '<=', $now)
            ->where('booking_deadline_date', '>=', $now)
            ->orderBy('event_date', 'asc')
            ->paginate(10);

        return response()->json(['events' => $events]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        $validated = $request->validated();

        $validated['user_id'] = request()->user()->id;

        $event = Event::create($validated);

        return response()->json($event);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return response()->json($event);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditEventRequest $request, Event $event)
    {
        $validated = $request->validated();

        $event->update($validated);

        return response()->json($event);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        if (request()->user()->id !== $event->user_id && request()->user()->role !== 'admin') {
            abort(403);
        }

        $event->delete();

        return response()->json(['success' => 'event deleted']);
    }
}
