@auth
    @if (Auth::user()->role === 'user')
        <x-guest-layout :title="$event->name">
            <section class="py-8 px-4 sm:px-6 lg:px-8">
                <div class="max-w-6xl mx-auto">
                    <article class="max-w-2xl mx-auto bg-gray-50 rounded-lg p-8 sm:p-10 flex flex-col gap-4">
                        <header>
                            <h1 class="text-2xl font-bold text-gray-900 mb-2">{{ $event->name }}</h1>
                            <p class="text-gray-700">{{ $event->details }}</p>
                        </header>

                        <section class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-4">
                            <div>
                                <h2 class="text-sm font-medium text-gray-500 uppercase">Venue</h2>
                                <p class="text-base text-gray-800">{{ $event->venue }}</p>
                            </div>

                            <div>
                                <h2 class="text-sm font-medium text-gray-500 uppercase">Event Date</h2>
                                <p class="text-base text-gray-800">
                                    {{ \Carbon\Carbon::parse($event->event_date)->format('d-m-Y') }}</p>
                            </div>

                            <div>
                                <h2 class="text-sm font-medium text-gray-500 uppercase">Ticket Price</h2>
                                <p class="text-base text-gray-800">TSH {{ number_format($event->ticket_price, 0) }}/=</p>
                            </div>

                            <div>
                                <h2 class="text-sm font-medium text-gray-500 uppercase">Tickets Remaining</h2>
                                <p class="text-base text-gray-800">{{ $event->available_tickets }}</p>
                            </div>

                            <div>
                                <h2 class="text-sm font-medium text-gray-500 uppercase">Booking Starts</h2>
                                <p class="text-base text-gray-800">
                                    {{ \Carbon\Carbon::parse($event->booking_start_date)->format('d-m-Y') }}</p>
                            </div>

                            <div>
                                <h2 class="text-sm font-medium text-gray-500 uppercase">Booking Deadline</h2>
                                <p class="text-base text-gray-800">
                                    {{ \Carbon\Carbon::parse($event->booking_deadline_date)->format('d-m-Y') }}</p>
                            </div>
                        </section>

                        <footer class="mt-6 flex flex-wrap gap-3">
                            <form action="/booking/create/{{ $event->id }}" method="get">
                                @csrf
                                <button type="submit"
                                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm px-4 py-2 rounded transition">
                                    Book Now
                                </button>
                            </form>

                            @auth
                                @if (Auth::user()->role === 'admin' && $event->bookingHasNotStarted())
                                    <form action="/event/edit/{{ $event->id }}" method="get">
                                        @csrf
                                        <button type="submit"
                                            class="text-sm text-gray-600 hover:underline px-4 py-2 rounded transition">
                                            Edit Event
                                        </button>
                                    </form>
                                    <form action="/event/{{ $event->id }}" method="post"
                                        onsubmit="return confirm('Are you sure?')">
                                        @method('delete')
                                        @csrf
                                        <button disabled type="submit"
                                            class="text-sm text-red-400 opacity-50 px-4 py-2 rounded transition">
                                            Delete Event
                                        </button>
                                    </form>
                                @endif
                            @endauth
                        </footer>
                    </article>
                </div>
            </section>
        </x-guest-layout>
    @endif

    @if (Auth::user()->role === 'organizer')
        <x-organizer-layout :title="$event->name">
            <section class="py-8 px-4 sm:px-6 lg:px-8">
                <div class="max-w-6xl mx-auto">
                    <article class="max-w-2xl mx-auto bg-gray-50 rounded-lg p-8 sm:p-10 flex flex-col gap-4">
                        <header>
                            <h1 class="text-2xl font-bold text-gray-900 mb-2">{{ $event->name }}</h1>
                            <p class="text-gray-700">{{ $event->details }}</p>
                        </header>

                        <section class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-4">
                            <div>
                                <h2 class="text-sm font-medium text-gray-500 uppercase">Venue</h2>
                                <p class="text-base text-gray-800">{{ $event->venue }}</p>
                            </div>

                            <div>
                                <h2 class="text-sm font-medium text-gray-500 uppercase">Event Date</h2>
                                <p class="text-base text-gray-800">
                                    {{ \Carbon\Carbon::parse($event->event_date)->format('d-m-Y') }}</p>
                            </div>

                            <div>
                                <h2 class="text-sm font-medium text-gray-500 uppercase">Ticket Price</h2>
                                <p class="text-base text-gray-800">TSH {{ number_format($event->ticket_price, 0) }}/=</p>
                            </div>

                            <div>
                                <h2 class="text-sm font-medium text-gray-500 uppercase">Tickets Remaining</h2>
                                <p class="text-base text-gray-800">{{ $event->available_tickets }}</p>
                            </div>

                            <div>
                                <h2 class="text-sm font-medium text-gray-500 uppercase">Booking Starts</h2>
                                <p class="text-base text-gray-800">
                                    {{ \Carbon\Carbon::parse($event->booking_start_date)->format('d-m-Y') }}</p>
                            </div>

                            <div>
                                <h2 class="text-sm font-medium text-gray-500 uppercase">Booking Deadline</h2>
                                <p class="text-base text-gray-800">
                                    {{ \Carbon\Carbon::parse($event->booking_deadline_date)->format('d-m-Y') }}</p>
                            </div>
                        </section>

                        <footer class="mt-6 flex flex-wrap gap-3">
                            <form action="/booking/create/{{ $event->id }}" method="get">
                                @csrf
                                <button type="submit"
                                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm px-4 py-2 rounded transition">
                                    Book Now
                                </button>
                            </form>

                            @auth
                                @if (Auth::user()->role === 'admin' && $event->bookingHasNotStarted())
                                    <form action="/event/edit/{{ $event->id }}" method="get">
                                        @csrf
                                        <button type="submit"
                                            class="text-sm text-gray-600 hover:underline px-4 py-2 rounded transition">
                                            Edit Event
                                        </button>
                                    </form>
                                    <form action="/event/{{ $event->id }}" method="post"
                                        onsubmit="return confirm('Are you sure?')">
                                        @method('delete')
                                        @csrf
                                        <button disabled type="submit"
                                            class="text-sm text-red-400 opacity-50 px-4 py-2 rounded transition">
                                            Delete Event
                                        </button>
                                    </form>
                                @endif
                            @endauth
                        </footer>
                    </article>
                </div>
            </section>
        </x-organizer-layout>
    @endif

    @if (Auth::user()->role === 'admin')
        <x-admin-layout :title="$event->name">
            <section class="py-8 px-4 sm:px-6 lg:px-8">
                <div class="max-w-6xl mx-auto">
                    <article class="max-w-2xl mx-auto bg-gray-50 rounded-lg p-8 sm:p-10 flex flex-col gap-4">
                        <header>
                            <h1 class="text-2xl font-bold text-gray-900 mb-2">{{ $event->name }}</h1>
                            <p class="text-gray-700">{{ $event->details }}</p>
                        </header>

                        <section class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-4">
                            <div>
                                <h2 class="text-sm font-medium text-gray-500 uppercase">Venue</h2>
                                <p class="text-base text-gray-800">{{ $event->venue }}</p>
                            </div>

                            <div>
                                <h2 class="text-sm font-medium text-gray-500 uppercase">Event Date</h2>
                                <p class="text-base text-gray-800">
                                    {{ \Carbon\Carbon::parse($event->event_date)->format('d-m-Y') }}</p>
                            </div>

                            <div>
                                <h2 class="text-sm font-medium text-gray-500 uppercase">Ticket Price</h2>
                                <p class="text-base text-gray-800">TSH {{ number_format($event->ticket_price, 0) }}/=</p>
                            </div>

                            <div>
                                <h2 class="text-sm font-medium text-gray-500 uppercase">Tickets Remaining</h2>
                                <p class="text-base text-gray-800">{{ $event->available_tickets }}</p>
                            </div>

                            <div>
                                <h2 class="text-sm font-medium text-gray-500 uppercase">Booking Starts</h2>
                                <p class="text-base text-gray-800">
                                    {{ \Carbon\Carbon::parse($event->booking_start_date)->format('d-m-Y') }}</p>
                            </div>

                            <div>
                                <h2 class="text-sm font-medium text-gray-500 uppercase">Booking Deadline</h2>
                                <p class="text-base text-gray-800">
                                    {{ \Carbon\Carbon::parse($event->booking_deadline_date)->format('d-m-Y') }}</p>
                            </div>
                        </section>

                        <footer class="mt-6 flex flex-wrap gap-3">
                            <form action="/booking/create/{{ $event->id }}" method="get">
                                @csrf
                                <button type="submit"
                                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm px-4 py-2 rounded transition">
                                    Book Now
                                </button>
                            </form>

                            @auth
                                @if (Auth::user()->role === 'admin' && $event->bookingHasNotStarted())
                                    <form action="/event/edit/{{ $event->id }}" method="get">
                                        @csrf
                                        <button type="submit"
                                            class="text-sm text-gray-600 hover:underline px-4 py-2 rounded transition">
                                            Edit Event
                                        </button>
                                    </form>
                                    <form action="/event/{{ $event->id }}" method="post"
                                        onsubmit="return confirm('Are you sure?')">
                                        @method('delete')
                                        @csrf
                                        <button disabled type="submit"
                                            class="text-sm text-red-400 opacity-50 px-4 py-2 rounded transition">
                                            Delete Event
                                        </button>
                                    </form>
                                @endif
                            @endauth
                        </footer>
                    </article>
                </div>
            </section>
        </x-admin-layout>
    @endif
@else
    <x-guest-layout :title="$event->name">
        <section class="py-8 px-4 sm:px-6 lg:px-8">
            <div class="max-w-6xl mx-auto">
                <article class="max-w-2xl mx-auto bg-gray-50 rounded-lg p-8 sm:p-10 flex flex-col gap-4">
                    <header>
                        <h1 class="text-2xl font-bold text-gray-900 mb-2">{{ $event->name }}</h1>
                        <p class="text-gray-700">{{ $event->details }}</p>
                    </header>

                    <section class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-4">
                        <div>
                            <h2 class="text-sm font-medium text-gray-500 uppercase">Venue</h2>
                            <p class="text-base text-gray-800">{{ $event->venue }}</p>
                        </div>

                        <div>
                            <h2 class="text-sm font-medium text-gray-500 uppercase">Event Date</h2>
                            <p class="text-base text-gray-800">
                                {{ \Carbon\Carbon::parse($event->event_date)->format('d-m-Y') }}</p>
                        </div>

                        <div>
                            <h2 class="text-sm font-medium text-gray-500 uppercase">Ticket Price</h2>
                            <p class="text-base text-gray-800">TSH {{ number_format($event->ticket_price, 0) }}/=</p>
                        </div>

                        <div>
                            <h2 class="text-sm font-medium text-gray-500 uppercase">Tickets Remaining</h2>
                            <p class="text-base text-gray-800">{{ $event->available_tickets }}</p>
                        </div>

                        <div>
                            <h2 class="text-sm font-medium text-gray-500 uppercase">Booking Starts</h2>
                            <p class="text-base text-gray-800">
                                {{ \Carbon\Carbon::parse($event->booking_start_date)->format('d-m-Y') }}</p>
                        </div>

                        <div>
                            <h2 class="text-sm font-medium text-gray-500 uppercase">Booking Deadline</h2>
                            <p class="text-base text-gray-800">
                                {{ \Carbon\Carbon::parse($event->booking_deadline_date)->format('d-m-Y') }}</p>
                        </div>
                    </section>

                    <footer class="mt-6 flex flex-wrap gap-3">
                        <form action="/booking/create/{{ $event->id }}" method="get">
                            @csrf
                            <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm px-4 py-2 rounded transition">
                                Book Now
                            </button>
                        </form>

                        @auth
                            @if (Auth::user()->role === 'admin' && $event->bookingHasNotStarted())
                                <form action="/event/edit/{{ $event->id }}" method="get">
                                    @csrf
                                    <button type="submit"
                                        class="text-sm text-gray-600 hover:underline px-4 py-2 rounded transition">
                                        Edit Event
                                    </button>
                                </form>
                                <form action="/event/{{ $event->id }}" method="post"
                                    onsubmit="return confirm('Are you sure?')">
                                    @method('delete')
                                    @csrf
                                    <button disabled type="submit"
                                        class="text-sm text-red-400 opacity-50 px-4 py-2 rounded transition">
                                        Delete Event
                                    </button>
                                </form>
                            @endif
                        @endauth
                    </footer>
                </article>
            </div>
        </section>
    </x-guest-layout>
@endauth
