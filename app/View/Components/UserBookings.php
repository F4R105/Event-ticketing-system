<?php

namespace App\View\Components;

use App\Models\Booking;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class UserBookings extends Component
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
        $bookings = Booking::where('user_id', Auth::user()->id)->get();
        return view('components.user-bookings', ['bookings' => $bookings]);
    }
}
