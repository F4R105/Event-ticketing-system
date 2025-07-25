@props(['title' => 'Organizer'])
<x-system-layout title="{{ $title }}">
    <x-navbar user="organizer" />
    <main class="pt-20 min-h-screen flex flex-col bg-gray-200 gap-4">
        {{ $slot }}
    </main>
</x-system-layout>
