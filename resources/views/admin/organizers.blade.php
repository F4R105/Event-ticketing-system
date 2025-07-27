<x-admin-layout title="Admin">
    <section id="available_events">
        <div class="w-full max-w-6xl p-5 mx-auto">
            <x-section-header title="Event organizers" />
            @props(['events'])

            @if ($organizers->isEmpty())
                <div
                    class="min-h-[50vh] border border-gray-200 rounded-lg shadow-sm p-4 mb-5 flex justify-center items-center gap-4">
                    <span class="text-gray-400 text-2xl">There are no event organizers</span>
                </div>
            @endif

            @foreach ($organizers as $organizer)
                <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-4 mb-5 flex gap-4">

                    <div class="flex-1 pr-6">
                        <div class="flex justify-content-center gap-2 text-blue-700" title="View event">
                            <h2 class="text-lg font-bold mb-1 line-clamp-1">{{ $organizer->name }}</h2>
                        </div>
                        <p class="text-sm text-gray-500 mb-2 line-clamp-1">{{ $organizer->email }}</p>
                        <p class="text-gray-700 text-sm mb-3 max-w-xl line-clamp-3">
                            <strong>Business name:</strong> {{ $organizer->business_name }}
                        </p>

                        <div class="flex gap-2 mt-6">
                            <form action="#" method="post" onsubmit="confirm('Are you sure?')">
                                @csrf
                                <button disabled type="submit"
                                    class="cursor-pointer opacity-[.3] inline-block bg-red-600 hover:bg-red-700 text-white font-semibold text-sm px-4 py-2 rounded shadow-sm transition">
                                    Demote
                                </button>
                            </form>
                        </div>
                    </div>

                    <ul class="text-sm text-gray-800 space-y-1">
                        <li class="px-2"><strong>Approved on:</strong>
                            {{ \Carbon\Carbon::parse($organizer->updated_at)->format('d-m-Y') }}</li>
                        <li class="px-2"><strong>Events created:</strong> {{ $organizer->events->count() }}</li>
                    </ul>
                </div>
            @endforeach

        </div>
    </section>
</x-admin-layout>
