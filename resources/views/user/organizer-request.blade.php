<x-user-layout title="Request event organizer role">
    <section>
        <div class="w-full max-w-6xl p-5 mx-auto">
            <div class="flex justify-center items-center py-10 rounded">
                @if ($status === 'sent')
                    <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-md space-y-5">
                        <p class="text-gray-500">Request sent. Waiting for feedback...</p>
                    </div>
                @else
                    <form method="POST" action="/user/request"
                        class="w-full max-w-md bg-white p-6 rounded-lg shadow-md space-y-5">
                        @csrf

                        @include('partials.session-message')

                        <x-section-header title="Organizer role request" />

                        <!-- Note -->
                        <div class="bg-gray-50 p-4 rounded border border-gray-200 text-sm text-gray-400 space-y-1">
                            <p><strong>Note:</strong> Once approved, your account will change role from <span
                                    class="text-blue-600">user</span> to <span class="text-blue-600">organizer</span>.
                                You will then be able to create events.</p>
                        </div>

                        <!-- Business name field -->
                        <div>
                            <label for="business_name" class="block text-sm font-medium text-gray-700">Business
                                name</label>
                            <input type="text" name="business_name" id="business_name" required
                                value="{{ old('business_name') }}"
                                class="mt-1 block w-full px-4 py-2 border @error('business_name') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">

                            @error('business_name')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit"
                                class="cursor-pointer w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition">
                                Request organizer role
                            </button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </section>
</x-user-layout>
