<x-guest-layout title="Forgot password">
    <section>
        <div class="w-full max-w-6xl p-5 mx-auto">
            <div class="min-h-screen flex items-center justify-center bg-gray-50">
                <form method="POST" action="/forgot-password" class="w-full max-w-md bg-white p-6 rounded-lg shadow">
                    @csrf

                    @include('partials.session-message')

                    <x-section-header title="Reset password" />

                    <!-- Email Field -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                        <input type="email" name="email" id="email" required value="{{ old('email') }}"
                            class="mt-1 block w-full px-4 py-2 border @error('email') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">

                        @error('email')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password reset Button -->
                    <div class="mb-4">
                        <button type="submit"
                            class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition">
                            Reset password
                        </button>
                    </div>

                    <!-- Login Link -->
                    <div class="text-center">
                        <span class="text-sm text-gray-600">Remembered your password?</span>
                        <a href="/login" class="text-blue-600 hover:underline ml-1">
                            Login here
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-guest-layout>
