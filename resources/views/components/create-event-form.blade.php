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
        <label for="datetime" class="block text-sm font-medium text-gray-700">Date and time</label>
        <input type="datetime" name="datetime" id="datetime" required value="{{ old('datetime') }}"
            class="mt-1 block w-full px-4 py-2 border @error('datetime') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">

        @error('datetime')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <!-- Event details Field -->
    <div class="mb-4">
        <label for="details" class="block text-sm font-medium text-gray-700">Date and time</label>
        <textarea name="details" id="details" required value="{{ old('details') }}"
            class="mt-1 block w-full px-4 py-2 border @error('details') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">

        @error('details')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <!-- Price Field -->
    <div class="mb-4">
        <label for="price" class="block text-sm font-medium text-gray-700">Ticket price</label>
        <input type="number" name="price" id="price" required value="{{ old('price') }}"
            class="mt-1 block w-full px-4 py-2 border @error('price') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">

        @error('price')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <!-- Available tickets Field -->
    <div class="mb-4">
        <label for="amount" class="block text-sm font-medium text-gray-700">Number of tickets available</label>
        <input type="number" name="amount" id="amount" required value="{{ old('amount') }}"
            class="mt-1 block w-full px-4 py-2 border @error('amount') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">

        @error('amount')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <!-- Booking start date Field -->
    <div class="mb-4">
        <label for="booking_start_date" class="block text-sm font-medium text-gray-700">Number of tickets
            available</label>
        <input type="date" name="booking_start_date" id="booking_start_date" required value="{{ old('booking_start_date') }}"
            class="mt-1 block w-full px-4 py-2 border @error('booking_start_date') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">

        @error('booking_start_date')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <!-- Booking deadline date Field -->
    <div class="mb-4">
        <label for="booking_deadline_date" class="block text-sm font-medium text-gray-700">Number of tickets
            available</label>
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
