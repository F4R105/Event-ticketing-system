@if (Auth::user()->role === 'user')
    <x-user-layout title="My tickets">
        <section>
            <div class="w-full max-w-6xl p-5 mx-auto">
                <x-section-header title="My tickets" />
                <x-user-bookings />
            </div>
        </section>
    </x-user-layout>
@endif

@if (Auth::user()->role === 'organizer')
    <x-organizer-layout title="My tickets">
        <section>
            <div class="w-full max-w-6xl p-5 mx-auto">
                <x-section-header title="My tickets" />
                <x-user-bookings />
            </div>
        </section>
    </x-organizer-layout>
@endif

@if (Auth::user()->role === 'admin')
    <x-admin-layout title="My tickets">
        <section>
            <div class="w-full max-w-6xl p-5 mx-auto">
                <x-section-header title="My tickets" />
                <x-user-bookings />
            </div>
        </section>
    </x-admin-layout>
@endif
