<x-admin-layout title="Admin">
    <section id="available_events">
        <div class="w-full max-w-6xl p-5 mx-auto">
            <x-section-header title="Organizer role requests" />
            @props(['events'])

            @if ($requests->isEmpty())
                <div
                    class="min-h-[50vh] border border-gray-200 rounded-lg shadow-sm p-4 mb-5 flex justify-center items-center gap-4">
                    <span class="text-gray-400 text-2xl">There are no requests</span>
                </div>
            @endif

            @foreach ($requests as $request)
                <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-4 mb-5 flex gap-4">

                    <div class="flex-1 pr-6">
                        <a href="#" class="flex justify-content-center gap-2 text-blue-700" title="View event">
                            <h2 class="text-lg font-bold mb-1 hover:underline line-clamp-1">{{ $request->name }}</h2>
                            <span>&rarr;</span>
                        </a>
                        <p class="text-sm text-gray-500 mb-2 line-clamp-1">{{ $request->email }}</p>
                        <p class="text-gray-700 text-sm mb-3 max-w-xl line-clamp-3">
                            <strong>Business name:</strong> {{ $request->business_name }}
                        </p>

                        <div class="flex gap-2 mt-6">
                            <form action="#" method="post" onsubmit="confirm('Are you sure?')">
                                @csrf
                                <button type="submit"
                                    class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm px-4 py-2 rounded shadow-sm transition">
                                    Approve
                                </button>
                            </form>
                            <form action="#" method="post" onsubmit="confirm('Are you sure?')">
                                @csrf
                                <button disabled type="submit"
                                    class="opacity-[.5] bg-transparent  text-red-400 text-sm px-4 py-2 rounded shadow-sm transition cursor-pointer disabled">
                                    Reject
                                </button>
                            </form>
                        </div>
                    </div>

                    <ul class="text-sm text-gray-800 space-y-1">
                        <li class="px-2"><strong>Requested on:</strong>
                            {{ \Carbon\Carbon::parse($request->created_at)->format('d-m-Y') }}</li>
                        <li class="px-2"><strong>Events attended:</strong>
                            {{ $request->bookings->count() }}</li>
                    </ul>
                </div>
            @endforeach

        </div>
    </section>
</x-admin-layout>
