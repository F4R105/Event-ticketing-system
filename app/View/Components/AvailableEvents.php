<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Event;
use Carbon\Carbon;

class AvailableEvents extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $now = Carbon::now();

        $events = Event::where('booking_start_date', '<=', $now)
            ->where('booking_deadline_date', '>=', $now)
            ->orderBy('event_date', 'asc')
            ->paginate(10);

        return view('components.available-events', ['events' => $events]);
    }
}
