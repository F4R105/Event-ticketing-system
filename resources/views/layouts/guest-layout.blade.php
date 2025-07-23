@props(['title' => 'Welcome'])
<x-system-layout title="{{ $title }}">
    <x-navbar user="guest" />
    <main class="pt-16 min-h-screen flex flex-col bg-gray-200 gap-4">
        {{ $slot }}
    </main>
</x-system-layout>
