@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-4 py-3 bg-blue-600  rounded-md font-bold font-bold text-xs text-white uppercase tracking-widest  transition ease-in-out duration-150'
            : 'inline-flex items-center px-1 pt-1  text-sm font-bold leading-5  text-gray-600 hover:border-b hover:text-blue-600 hover:border-blue-600   focus:outline-none transition duration-250 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
