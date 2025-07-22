@props(['user' => 'guest'])

<nav class="bg-white shadow-md fixed w-full">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-4">
            <!-- Logo -->
            <a href="/">
                <h1 class="text-2xl font-bold text-blue-600">ETS System</h1>
            </a>

            <ul class="flex gap-4">
                <li>
                    <span>{{ Auth::user()->name }}</span>
                </li>

                @if ($user === 'guest')
                    <li>
                        <x-nav-link href="/login">Login</x-nav-link>
                    </li>
                @endif

                @if ($user === 'user')
                    <li>
                        <x-nav-link href="/login">My tickets</x-nav-link>
                    </li>
                @endif

                @if ($user === 'organizer')
                    <li>
                        <x-nav-link href="/login">My events</x-nav-link>
                    </li>
                    <li>
                        <x-nav-link href="/login">Create event</x-nav-link>
                    </li>
                @endif

                @if ($user === 'admin')
                    <li>
                        <x-nav-link href="/login">My events</x-nav-link>
                    </li>
                    <li>
                        <x-nav-link href="/login">Create event</x-nav-link>
                    </li>
                @endif

                <li>
                    <x-logout-button />
                </li>
            </ul>
        </div>
    </div>
</nav>
