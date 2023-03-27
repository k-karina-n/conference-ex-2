@props(['route'])

@php
    $classes = Request::routeIs($route) ? 'bg-gray-900 text-white' : 'text-gray-300';
@endphp

<a href="{{ route($route) }}" {{ $attributes->merge(['class' => "px-3 py-2 hover:bg-gray-700 hover:text-white rounded-md text-base text-white font-medium {$classes}"]) }}>
    {{ $slot }}
</a>