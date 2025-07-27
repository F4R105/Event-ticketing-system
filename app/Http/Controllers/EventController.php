<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditEventRequest;
use App\Http\Requests\StoreEventRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = $request->input('filter');
        return view('event.index', ['filter' => $filter]);
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
    public function store(StoreEventRequest $request)
    {
        $validated = $request->validated();

        $validated['user_id'] = Auth::user()->id;

        Event::create($validated);

        return redirect('/events');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('event.show', ['event' => $event]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        if (Auth::user()->id !== $event->user_id) {
            abort(403);
        }

        return view('event.edit', ['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditEventRequest $request, Event $event)
    {
        $validated = $request->validated();

        $event->update($validated);

        return redirect('/events');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        if (Auth::user()->id !== $event->user_id && Auth::user()->role !== 'admin') {
            abort(403);
        }

        $event->delete();

        return redirect()->back();
    }
}
