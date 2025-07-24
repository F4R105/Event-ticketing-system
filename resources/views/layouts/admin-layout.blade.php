@props(['title' => 'Admin'])
<x-system-layout title="{{ $title }}">
    <x-navbar user="admin" />
    <main class="pt-20 min-h-screen flex flex-col gap-4">
        {{ $slot }}
    </main>
</x-system-layout>
