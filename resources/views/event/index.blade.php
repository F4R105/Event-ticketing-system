@if (Auth::user()->role === 'admin')
    <x-admin-layout>
        <section id="available_events">
            <div class="w-full max-w-6xl p-5 mx-auto">
                <x-user-events />
            </div>
        </section>
    </x-admin-layout>
@endif

@if (Auth::user()->role === 'organizer')
    <x-organizer-layout>
        <section id="available_events">
            <div class="w-full max-w-6xl p-5 mx-auto">
                <x-user-events />
            </div>
        </section>
    </x-organizer-layout>
@endif
