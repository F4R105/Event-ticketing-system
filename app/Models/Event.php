<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function isBookingOpen(): bool
    {
        $now = Carbon::now();
        return $now->between(
            Carbon::parse($this->booking_start_date),
            Carbon::parse($this->booking_end_date)
        );
    }

    public function bookingHasNotStarted(): bool
    {
        return Carbon::now()->lt(Carbon::parse($this->booking_start_date));
    }

    public function bookingHasEnded(): bool
    {
        return Carbon::now()->gt(Carbon::parse($this->booking_end_date));
    }


    public function hasExpired(): bool
    {
        return Carbon::parse($this->event_date)->isPast();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
