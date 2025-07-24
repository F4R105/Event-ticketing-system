@props(['bookings'])

@if ($bookings->isEmpty())
    <div
        class="min-h-[50vh] border border-gray-200 rounded-lg shadow-sm p-4 mb-5 flex flex-col justify-center items-center gap-4">
        <span class="text-gray-400 text-2xl">You have no tickets booked yet</span>
    </div>
@endif

@foreach ($bookings as $booking)
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-4 mb-5 flex gap-4">

        <div class="bg-gray-100 p-4 rounded-lg flex flex-col justify-center items-center">
            <div class="text-2xl font-semibold">{{ \Carbon\Carbon::parse($booking->event->booking_date)->format('d') }}</div>
            <div class="text-sm">{{ \Carbon\Carbon::parse($booking->event->booking_date)->format('M') }}</div>
            <div style="opacity: .4">{{ \Carbon\Carbon::parse($booking->event->booking_date)->format('Y') }}</div>
        </div>

        <div class="flex-1 pr-6">
            <a href="#" class="flex justify-content-center gap-2 text-blue-700" title="View booking">
                <h2 class="text-lg font-bold mb-1 hover:underline line-clamp-1">{{ $booking->event->name }}</h2>
                <span>&rarr;</span>
            </a>
            <p class="text-sm text-gray-500 mb-2 line-clamp-1">{{ $booking->event->venue }}</p>
            <p class="text-gray-700 text-sm mb-3 max-w-xl line-clamp-3">{{ $booking->event->details }}</p>

            {{-- <div class="flex gap-2 mt-6">
                <a href="#"
                    class="inline-block bg-transparent hover:underline  text-gray-600 text-sm px-4 py-2 rounded shadow-sm transition">
                    Edit booking
                </a>
                <form action="/booking/{{ $booking->id }}" method="post" onsubmit="confirm('Are you sure?')">
                    @method('delete')
                    @csrf
                    <button type="submit"
                        class="bg-transparent hover:underline  text-red-400 text-sm px-4 py-2 rounded shadow-sm transition cursor-pointer">
                        Delete booking
                    </button>
                </form>
            </div> --}}
        </div>

        <ul class="text-sm text-gray-800 space-y-1">
            <li class="border border-gray-400 p-2 rounded mb-4"><strong>Booking Price:</strong> TSH
                {{ number_format($booking->total_price, 0) }}/=</li>
            <li class="px-2"><strong>Organizer:</strong> {{ $booking->event->user->business_name }}</li>
            <li class="px-2 text-blue-600"><strong>Tickets booked:</strong> {{ $booking->quantity }}</li>
        </ul>
    </div>
@endforeach
