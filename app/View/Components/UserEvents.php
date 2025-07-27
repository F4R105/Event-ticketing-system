<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserEvents extends Component
{
    public string|null $filter;

    public function __construct(string|null $filter)
    {
        $this->filter = $filter;
    }

    public function render(): View|Closure|string
    {
        $now = Carbon::now();
        $events = Event::query();
        $emptyEventsMessage = "You have no events yet";

        switch ($this->filter) {
            case 'initial':
                $events->where('booking_start_date', '>', $now);
                $emptyEventsMessage = "You have no events awaiting booking";
                break;
            case 'booking':
                $events->where('booking_start_date', '<=', $now)
                    ->where('booking_deadline_date', '>=', $now);
                $emptyEventsMessage = "You have no event currently open for booking";
                break;
            case 'preparation':
                $events->where('booking_deadline_date', '<=', $now)
                    ->where('event_date', '>=', $now);
                $emptyEventsMessage = "You have no events requiring preparation";
                break;
            case 'expired':
                $events->where('event_date', '<', $now);
                $emptyEventsMessage = "You have no past events";
                break;
        }

        return view('components.user-events', [
            'events' => $events->where('user_id', Auth::id())->orderBy('event_date','asc')->paginate(10),
            'message' => $emptyEventsMessage
        ]);
    }
}
