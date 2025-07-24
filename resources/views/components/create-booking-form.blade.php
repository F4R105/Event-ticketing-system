@props(['event'])

@if(is_string($event))
    @php $event = json_decode($event) @endphp
@endif

<form method="POST" action="/booking" class="w-full max-w-md bg-white p-6 rounded-lg shadow-md space-y-5">
    @csrf

    @include('partials.session-message')

    <!-- Event Summary -->
    <div class="bg-gray-50 p-4 rounded border border-gray-200 text-sm text-gray-700 space-y-1">
        <p><strong>Event:</strong> {{ $event->name }}</p>
        <p><strong>Venue:</strong> {{ $event->venue }}</p>
        <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($event->event_date)->format('d-m-Y') }}</p>
        <p><strong>Price per ticket:</strong> Tsh {{ number_format($event->ticket_price, 0) }}/=</p>
        <p><strong>Remaining tickets:</strong> {{ $event->available_tickets}} tickets</p>
    </div>

    <!-- Quantity Field -->
    <div>
        <label for="quantity" class="block text-sm font-medium text-gray-700">Ticket quantity</label>
        <input type="number" name="quantity" id="quantity" min="1" max="{{ $event->available_tickets }}" required value="{{ old('quantity', 1) }}"
            class="mt-1 block w-full px-4 py-2 border @error('quantity') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">

        @error('quantity')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <input type="hidden" name="event_id" value="{{ $event->id }}">

    <!-- Total Price Display -->
    <div class="text-right text-sm font-semibold text-blue-700">
        Total price: <span id="totalPrice">Tsh {{ number_format($event->ticket_price, 0) }}/=</span>
    </div>

    <!-- Submit Button -->
    <div>
        <button type="submit" class="cursor-pointer w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition">
            Book ticket/s
        </button>
    </div>
</form>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const pricePerTicket = {{ $event->ticket_price }};
    const quantityInput = document.getElementById('quantity');
    const totalDisplay = document.getElementById('totalPrice');

    function updateTotal() {
        const qty = parseInt(quantityInput.value) || 1;
        const total = pricePerTicket * qty;
        totalDisplay.textContent = 'Tsh ' + total.toLocaleString() + '/=';
    }

    quantityInput.addEventListener('input', updateTotal);
    updateTotal(); // Run once on load
});
</script>
