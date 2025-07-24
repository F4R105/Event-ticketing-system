@props(['user'])

<nav class="bg-white shadow-md fixed z-50 w-full">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-4">
            <!-- Logo -->
            <div class="relative">
                <h1 class="text-2xl font-bold text-blue-600">ETS System</h1>
                @auth
                    <span class="absolute -bottom-5 right-0 text-xs text-blue-600 p-1 rounded shadow capitalize">
                        {{ Auth::user()->role }}
                    </span>
                @endauth
            </div>

            <ul class="flex items-center gap-4">
                @auth

                    @if ($user === 'user')
                        <li>
                            <x-nav-link href="/user">Home</x-nav-link>
                        </li>
                        <li>
                            <x-nav-link href="/login">My tickets</x-nav-link>
                        </li>
                        <li>
                            <x-nav-link href="#">Create event</x-nav-link>
                        </li>
                    @endif

                    @if ($user === 'organizer')
                        <li>
                            <x-nav-link href="/organizer">Home</x-nav-link>
                        </li>
                        <li>
                            <x-nav-link href="/events">My events</x-nav-link>
                        </li>
                        <li>
                            <x-nav-link href="/login">My tickets</x-nav-link>
                        </li>
                        <li>
                            <x-nav-link href="/event/create">Create event</x-nav-link>
                        </li>
                    @endif

                    @if ($user === 'admin')
                        <li>
                            <x-nav-link href="/admin">Home</x-nav-link>
                        </li>
                        <li>
                            <x-nav-link href="/login">My events</x-nav-link>
                        </li>
                        <li>
                            <x-nav-link href="/events">My tickets</x-nav-link>
                        </li>
                        <li>
                            <x-nav-link href="/event/create">Create event</x-nav-link>
                        </li>
                    @endif

                    <div class="relative ml-8 w-[48px] h-[48px] border border-gray-300 shadow-lg rounded-full group">
                        <div
                            class="absolute -bottom-5 right-[50%] translate-x-[50%] bg-white rounded-md shadow-lg overflow-hidden">
                            {{-- <span class="text-sm">{{ Auth::user()->name }}</span> --}}
                            <form action="/logout" method="post" class="text-center hover:bg-red-200">
                                @csrf
                                <button type="submit" class="cursor-pointer text-xs text-red-400 py-1 px-2">Logout</button>
                            </form>
                        </div>
                    </div>
                @else
                    <li>
                        <x-nav-link href="/">Home</x-nav-link>
                    </li>
                    <li>
                        @if (request()->is('login'))
                            <x-nav-link href="/register">Register</x-nav-link>
                        @else
                            <x-nav-link href="/login">Login</x-nav-link>
                        @endif
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
