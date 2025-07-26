@if (Auth::user()->role === 'admin')
    <x-admin-layout>
        <section>
            <div class="w-full max-w-6xl p-5 mx-auto">
                <div class="min-h-screen py-10 flex items-center justify-center bg-gray-50">
                    <x-edit-event-form :event="$event" />
                </div>
            </div>
        </section>
    </x-admin-layout>
@endif

@if (Auth::user()->role === 'organizer')
    <x-organizer-layout>
        <section>
            <div class="w-full max-w-6xl p-5 mx-auto">
                <div class="min-h-screen py-10 flex items-center justify-center bg-gray-50">
                    <x-edit-event-form :event="$event" />
                </div>
            </div>
        </section>
    </x-organizer-layout>
@endif
