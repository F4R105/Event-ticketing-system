<x-guest-layout title="Reset Password">
    <section>
        <div class="w-full max-w-6xl p-5 mx-auto">
            <div class="min-h-screen flex items-center justify-center bg-gray-50">
                <form method="POST" action="/register" class="w-full max-w-md bg-white p-6 rounded-lg shadow">
                    @method('put')
                    @csrf

                    @include('partials.session-message')

                    <x-section-header title="Reset password" />

                    <input type="hidden" name="user_id" value="{{ $user->id }}">

                    <!-- Password Field -->
                    <div class="mb-6">
                        <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
                        <input type="password" name="password" id="password" required
                            class="mt-1 block w-full px-4 py-2 border @error('password') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">

                        @error('password')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password Field -->
                    <div class="mb-6">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required
                            class="mt-1 block w-full px-4 py-2 border @error('password_confirmation') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">

                        @error('password_confirmation')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Register Button -->
                    <div class="mb-4">
                        <button type="submit"
                            class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition">
                            Reset password
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </section>
</x-guest-layout>
