@props(['title' => 'Organizer'])
<x-system-layout title="{{ $title }}">
    <x-navbar user="user" />
    <main class="pt-16 min-h-screen flex flex-col">
        {{ $slot }}
    </main>
</x-system-layout>