<x-guest-layout title="Login">
    <section>
        <div class="w-full max-w-6xl p-5 mx-auto">
            <div class="min-h-screen flex items-center justify-center bg-gray-50">
                <form method="POST" action="/login" class="w-full max-w-md bg-white p-6 rounded-lg shadow">
                    @csrf
                    
                    @include('partials.session-message')
                    
                    <x-section-header title="Login" />
                    
                    <!-- Email Field -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                        <input type="email" name="email" id="email" required
                            value="{{ old('email') }}"
                            class="mt-1 block w-full px-4 py-2 border @error('email') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">

                        @error('email')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div class="mb-6">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" name="password" id="password" required
                            class="mt-1 block w-full px-4 py-2 border @error('password') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">

                        @error('password')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Login Button -->
                    <div class="mb-4">
                        <button type="submit"
                            class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition">
                            Login
                        </button>
                    </div>

                    <!-- Register Link -->
                    <div class="text-center">
                        <span class="text-sm text-gray-600">Don’t have an account?</span>
                        <a href="/register" class="text-blue-600 hover:underline ml-1">
                            Register here
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-guest-layout>
