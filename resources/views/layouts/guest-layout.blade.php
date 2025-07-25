@props(['title' => 'Welcome'])
<x-system-layout title="{{ $title }}">
    <x-navbar />
    <main class="min-h-screen flex flex-col bg-gray-200 gap-4">
        {{ $slot }}
    </main>
</x-system-layout>
