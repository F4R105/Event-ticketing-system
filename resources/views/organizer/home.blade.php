<x-organizer-layout title="Organizer">
    <section>
        <div class="w-full max-w-6xl p-5 mx-auto bg-amber-300">
            <h1>Welcome {{ Auth::user()->business_name }}</h1>
        </div>
    </section>
    <section id="available_events">
        <div class="w-full max-w-6xl p-5 mx-auto">
            <x-available-events />
        </div>
    </section>
</x-organizer-layout>
