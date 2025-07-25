@props(['event'])

@if (Auth::user()->role === 'user')
    <x-user-layout>
        <section>
            <div class="w-full max-w-6xl p-5 mx-auto">
                <div class="min-h-[60vh] flex items-center justify-center bg-gray-50">
                    <x-create-booking-form :event="$event" />
                </div>
            </div>
        </section>
    </x-user-layout>
@endif

@if (Auth::user()->role === 'organizer')
    <x-organizer-layout>
        <section>
            <div class="w-full max-w-6xl p-5 mx-auto">
                <div class="min-h-[60vh] flex items-center justify-center bg-gray-50">
                    <x-create-booking-form :event="$event" />
                </div>
            </div>
        </section>
    </x-organizer-layout>
@endif

@if (Auth::user()->role === 'admin')
    <x-admin-layout>
        <section>
            <div class="w-full max-w-6xl p-5 mx-auto">
                <div class="min-h-[60vh] flex items-center justify-center bg-gray-50">
                    <x-create-booking-form :event="$event" />
                </div>
            </div>
        </section>
    </x-admin-layout>
@endif
