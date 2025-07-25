@props(['href'])

@php
    $isActive = request()->url() === url($href);
@endphp

<a
    {{ $attributes->merge([
        'href' => url($href),
        'class' => $isActive ? 'text-blue-600 font-semibold' : 'text-gray-600 text-sm hover:text-blue-400',
    ]) }}>
    {{ $slot }}
</a>
