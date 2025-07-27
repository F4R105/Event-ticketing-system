@if (Auth::user()->role === 'admin')
    <x-admin-layout title="Events">
        <section id="available_events">
            <div class="w-full max-w-6xl p-5 mx-auto">
                <x-section-header title="My events" />
                <div class="mb-6 flex gap-4">
                    <a href="?filter=all" class="flex gap-2 justify-start items-center hover:underline">
                        <div class="w-[20px] h-[20px] flex">
                            <span class="w-[5px] bg-white"></span>
                            <span class="w-[5px] bg-green-300"></span>
                            <span class="w-[5px] bg-red-300"></span>
                            <span class="w-[5px] bg-gray-300"></span>
                        </div>
                        <p class="text-sm">All events</p>
                    </a>
                    <a href="?filter=initial" class="flex gap-2 justify-start items-center hover:underline">
                        <div class="w-[20px] h-[20px] bg-white"></div>
                        <p class="text-sm">Booking has not started</p>
                    </a>
                    <a href="?filter=booking" class="flex gap-2 justify-start items-center hover:underline">
                        <div class="w-[20px] h-[20px] bg-green-300"></div>
                        <p class="text-sm">Booking is open</p>
                    </a>
                    <a href="?filter=preparation" class="flex gap-2 justify-start items-center hover:underline">
                        <div class="w-[20px] h-[20px] bg-red-300"></div>
                        <p class="text-sm">Booking complete</p>
                    </a>
                    <a href="?filter=expired" class="flex gap-2 justify-start items-center hover:underline">
                        <div class="w-[20px] h-[20px] bg-gray-300"></div>
                        <p class="text-sm">Past events</p>
                    </a>
                </div>
                <x-user-events :filter="$filter" />
            </div>
        </section>
    </x-admin-layout>
@endif

@if (Auth::user()->role === 'organizer')
    <x-organizer-layout title="Events">
        <section id="available_events">
            <div class="w-full max-w-6xl p-5 mx-auto">
                <x-section-header title="My events" />
                <div class="mb-2 flex gap-4">
                    <a href="" class="flex gap-2 justify-start items-center hover:underline">
                        <div class="w-[20px] h-[20px] bg-white"></div>
                        <p class="text-sm">All events</p>
                    </a>
                    <a href="" class="flex gap-2 justify-start items-center hover:underline">
                        <div class="w-[20px] h-[20px] bg-white"></div>
                        <p class="text-sm">Booking has not started</p>
                    </a>
                    <a href="" class="flex gap-2 justify-start items-center hover:underline">
                        <div class="w-[20px] h-[20px] bg-green-300"></div>
                        <p class="text-sm">Booking is open</p>
                    </a>
                    <a href="" class="flex gap-2 justify-start items-center hover:underline">
                        <div class="w-[20px] h-[20px] bg-red-300"></div>
                        <p class="text-sm">Booking has passed</p>
                    </a>
                </div>
                <x-user-events :filter="$filter" />
            </div>
        </section>
    </x-organizer-layout>
@endif
