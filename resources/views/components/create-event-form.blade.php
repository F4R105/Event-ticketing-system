<form method="POST" action="/event" class="w-full max-w-md bg-white p-6 rounded-lg shadow">
    @csrf

    @include('partials.session-message')

    <!-- Name Field -->
    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Event name</label>
        <input type="text" name="name" id="name" required value="{{ old('name') }}"
            class="mt-1 block w-full px-4 py-2 border @error('name') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">

        @error('name')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <!-- Venue Field -->
    <div class="mb-4">
        <label for="venue" class="block text-sm font-medium text-gray-700">Venue</label>
        <input type="text" name="venue" id="venue" required value="{{ old('venue') }}"
            class="mt-1 block w-full px-4 py-2 border @error('venue') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">

        @error('venue')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <!-- Date and time Field -->
    <div class="mb-4">
        <label for="event_date" class="block text-sm font-medium text-gray-700">Event date and time</label>
        <input type="datetime-local" name="event_date" id="event_date" required value="{{ old('event_date') }}"
            class="mt-1 block w-full px-4 py-2 border @error('event_date') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">

        @error('event_date')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <!-- Event details Field -->
    <div class="mb-4">
        <label for="details" class="block text-sm font-medium text-gray-700">Event details</label>
        <textarea name="details" id="details" required
            class="mt-1 block w-full px-4 py-2 border @error('details') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('details') }}</textarea>

        @error('details')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>


    <!-- Price Field -->
    <div class="mb-4">
        <label for="ticket_price" class="block text-sm font-medium text-gray-700">Ticket price</label>
        <input type="number" name="ticket_price" id="ticket_price" required value="{{ old('ticket_price') }}"
            class="mt-1 block w-full px-4 py-2 border @error('ticket_price') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">

        @error('ticket_price')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <!-- Available tickets Field -->
    <div class="mb-4">
        <label for="available_tickets" class="block text-sm font-medium text-gray-700">Number of tickets
            available</label>
        <input type="number" name="available_tickets" id="available_tickets" required
            value="{{ old('available_tickets') }}"
            class="mt-1 block w-full px-4 py-2 border @error('available_tickets') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">

        @error('available_tickets')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <!-- Booking start date Field -->
    <div class="mb-4">
        <label for="booking_start_date" class="block text-sm font-medium text-gray-700">Booking start</label>
        <input type="date" name="booking_start_date" id="booking_start_date" required
            value="{{ old('booking_start_date') }}"
            class="mt-1 block w-full px-4 py-2 border @error('booking_start_date') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">

        @error('booking_start_date')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <!-- Booking deadline date Field -->
    <div class="mb-4">
        <label for="booking_deadline_date" class="block text-sm font-medium text-gray-700">Booking deadline</label>
        <input type="date" name="booking_deadline_date" id="booking_deadline_date" required
            value="{{ old('booking_deadline_date') }}"
            class="mt-1 block w-full px-4 py-2 border @error('booking_deadline_date') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">

        @error('booking_deadline_date')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <!-- Create event Button -->
    <div class="mb-4">
        <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition">
            Create event
        </button>
    </div>
</form>