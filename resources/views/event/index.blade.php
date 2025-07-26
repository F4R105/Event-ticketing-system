@if (Auth::user()->role === 'admin')
    <x-admin-layout>
        <section id="available_events">
            <div class="w-full max-w-6xl p-5 mx-auto">
                <x-section-header title="My events" />
                <x-user-events />
            </div>
        </section>
    </x-admin-layout>
@endif

@if (Auth::user()->role === 'organizer')
    <x-organizer-layout>
        <section id="available_events">
            <div class="w-full max-w-6xl p-5 mx-auto">
                <x-section-header title="My events" />
                <div class="mb-2 flex gap-4">
                    <div class="flex gap-2 justify-start items-center">
                        <div class="w-[20px] h-[20px] bg-orange-300"></div>
                        <p class="text-sm">Booking has not started</p>
                    </div>
                    <div class="flex gap-2 justify-start items-center">
                        <div class="w-[20px] h-[20px] bg-green-300"></div>
                        <p class="text-sm">Booking is open</p>
                    </div>
                    <div class="flex gap-2 justify-start items-center">
                        <div class="w-[20px] h-[20px] bg-red-300"></div>
                        <p class="text-sm">Booking has passed</p>
                    </div>
                </div>
                <x-user-events />
            </div>
        </section>
    </x-organizer-layout>
@endif
