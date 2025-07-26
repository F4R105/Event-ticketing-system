@props(['events'])

@if ($events->isEmpty())
    <div
        class="min-h-[50vh] border border-gray-200 rounded-lg shadow-sm p-4 mb-5 flex justify-center items-center gap-4">
        <span class="text-gray-400 text-2xl">There are no events available</span>
    </div>
@endif

@foreach ($events as $event)
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-4 mb-5 flex gap-4">

        <div class="bg-gray-100 p-4 rounded-lg flex flex-col justify-center items-center">
            <div class="text-2xl font-semibold">{{ \Carbon\Carbon::parse($event->event_date)->format('d') }}</div>
            <div class="text-sm">{{ \Carbon\Carbon::parse($event->event_date)->format('M') }}</div>
            <div style="opacity: .4">{{ \Carbon\Carbon::parse($event->event_date)->format('Y') }}</div>
        </div>

        <div class="flex-1 pr-6">
            <a href="#" class="flex justify-content-center gap-2 text-blue-700" title="View event">
                <h2 class="text-lg font-bold mb-1 hover:underline line-clamp-1">{{ $event->name }}</h2>
                <span>&rarr;</span>
            </a>
            <p class="text-sm text-gray-500 mb-2 line-clamp-1">{{ $event->venue }}</p>
            <p class="text-gray-700 text-sm mb-3 max-w-xl line-clamp-3">{{ $event->details }}</p>

            <div class="flex gap-2 mt-6">
                <form action="/booking/create/{{ $event->id }}" method="get" onsubmit="confirm('Are you sure?')">
                    @csrf
                    <button type="submit"
                        class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm px-4 py-2 rounded shadow-sm transition">
                        Book Now
                    </button>
                </form>

                @if (Auth::user()->role === 'admin')
                    <form action="#" method="get" onsubmit="confirm('Are you sure?')">
                        @csrf
                        <button disabled type="submit"
                            class="opacity-[.5] inline-block bg-transparent  text-gray-600 text-sm px-4 py-2 rounded shadow-sm transition">
                            Edit Event
                        </button>
                    </form>
                    <form action="/event/{{ $event->id }}" method="post" onsubmit="confirm('Are you sure?')">
                        @method('delete')
                        @csrf
                        <button disabled type="submit"
                            class="opacity-[.5] bg-transparent  text-red-400 text-sm px-4 py-2 rounded shadow-sm transition">
                            Delete event
                        </button>
                    </form>
                @endif
            </div>
        </div>

        <ul class="text-sm text-gray-800 space-y-1">
            <li class="border border-gray-400 p-2 rounded mb-4"><strong>Ticket Price:</strong> TSH
                {{ number_format($event->ticket_price, 0) }}/=</li>
            <li class="px-2"><strong>Organizer:</strong> {{ $event->user->business_name }}</li>
            <li class="px-2"><strong>Remaining Tickets:</strong> {{ $event->available_tickets }}</li>
            <li class="px-2"><strong>Booking Deadline:</strong>
                {{ \Carbon\Carbon::parse($event->booking_deadline_date)->format('d-m-Y') }}</li>
        </ul>
    </div>
@endforeach
