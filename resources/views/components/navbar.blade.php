@props(['user'])

<nav class="bg-white shadow-md fixed w-full">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-4">
            <!-- Logo -->
            <h1 class="text-2xl font-bold text-blue-600">ETS System</h1>

            <ul class="flex items-center gap-4">
                @auth

                    @if ($user === 'user')
                        <li>
                            <x-nav-link href="/user">Home</x-nav-link>
                        </li>
                        <li>
                            <x-nav-link href="/login">My tickets</x-nav-link>
                        </li>
                    @endif

                    @if ($user === 'organizer')
                        <li>
                            <x-nav-link href="/organizer">Home</x-nav-link>
                        </li>
                        <li>
                            <x-nav-link href="/login">My events</x-nav-link>
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
                            <x-nav-link href="/event/create">Create event</x-nav-link>
                        </li>
                    @endif

                    <div class="flex items-center gap-2 ml-6">
                        <div class="w-[48px] h-[48px] border border-gray-300 shadow-lg rounded-full group">

                        </div>
                        <div class="bg-white rounded-md shadow-lg overflow-hidden">
                            {{-- <span class="text-sm">{{ Auth::user()->name }}</span> --}}
                            <form action="/logout" method="post" class="text-center hover:bg-red-200">
                                @csrf
                                <button type="submit" class="cursor-pointer text-xs text-red-400 p-1">Logout</button>
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
