<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class UserEvents extends Component
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
        $events = Event::where('user_id', Auth::user()->id)->get();
        return view('components.user-events', ['events' => $events]);
    }
}
