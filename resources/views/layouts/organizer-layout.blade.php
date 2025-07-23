@props(['title' => 'Organizer'])
<x-system-layout title="{{ $title }}">
    <x-navbar user="organizer" />
    <main class="pt-16 min-h-screen flex flex-col gap-4">
        {{ $slot }}
    </main>
</x-system-layout>
