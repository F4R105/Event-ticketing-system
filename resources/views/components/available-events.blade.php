@props(['events'])

@foreach ($events as $event)
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-4 mb-5 flex justify-between items-center">

        <div class="flex-1 pr-6">
            <a href="#" class="flex justify-content-center gap-2 text-blue-700" title="View event">
                <h2 class="text-lg font-bold mb-1 hover:underline">{{ $event->name }}</h2>
                <span>&rarr;</span>
            </a>
            <p class="text-sm text-gray-500 mb-2">{{ $event->venue }}</p>
            <p class="text-gray-700 text-sm mb-3 max-w-xl line-clamp-3">{{ $event->details }}</p>

            <div>
                <a href="#"
                    class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm px-4 py-2 rounded shadow-sm transition">
                    Book Now
                </a>
                <a href="#"
                    class="inline-block bg-transparent hover:underline  text-gray-600 text-sm px-4 py-2 rounded shadow-sm transition">
                    Edit Event
                </a>
                <a href="#"
                    class="inline-block bg-transparent hover:underline  text-red-400 text-sm px-4 py-2 rounded shadow-sm transition">
                    Delete Event
                </a>
            </div>
        </div>

        <ul class="text-sm text-gray-800 space-y-1">
            <li><strong>Event Date:</strong> {{ \Carbon\Carbon::parse($event->event_date)->format('d-m-Y') }}</li>
            <li><strong>Ticket Price:</strong> TSH {{ number_format($event->ticket_price, 0) }}/=</li>
            <li><strong>Available Tickets:</strong> {{ $event->available_tickets }}</li>
            <li><strong>Booking Deadline:</strong>
                {{ \Carbon\Carbon::parse($event->booking_deadline_date)->format('d-m-Y') }}</li>
        </ul>
    </div>
@endforeach
