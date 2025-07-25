<x-guest-layout>
    <section class="relative bg-gradient-to-r from-blue-600 via-blue-500 to-blue-400 text-white pt-20">
        <div class="max-w-7xl mx-auto px-6 py-16 lg:py-28 flex flex-col lg:flex-row items-center justify-between">

            <!-- Text Content -->
            <div class="lg:w-1/2 text-center lg:text-left space-y-6">
                <h1 class="text-4xl sm:text-5xl font-bold leading-tight">
                    Welcome to the Online Ticketing Platform
                </h1>
                <p class="text-lg sm:text-xl text-blue-100">
                    Book tickets for your events quickly, easily, and securely — all from one place.
                </p>
                <div class="flex justify-center lg:justify-start gap-4 pt-4">
                    <a href="#available_events"
                        class="bg-white text-blue-700 font-semibold px-6 py-3 rounded-md hover:bg-blue-100 transition">
                        Browse Events
                    </a>
                    <a href="/register"
                        class="border border-white px-6 py-3 rounded-md hover:bg-white hover:text-blue-700 transition">
                        Create Account
                    </a>
                </div>
            </div>

            <!-- Image/Illustration -->
            <div class="lg:w-1/2 mt-10 lg:mt-0 text-center">
                <img src="#" alt="Events illustration" class="w-full max-w-md mx-auto drop-shadow-lg">
            </div>
        </div>

        <!-- Decorative Background -->
        {{-- <div class="absolute inset-0 z-0 opacity-30 bg-cover bg-center"
            style="background-image: url('{{ asset('images/pattern.svg') }}')"></div> --}}
    </section>

    <section id="available_events">
        <div class="w-full max-w-6xl p-5 mx-auto">
            <x-section-header title="Available events" />
            <x-available-events />
        </div>
    </section>
</x-guest-layout>
