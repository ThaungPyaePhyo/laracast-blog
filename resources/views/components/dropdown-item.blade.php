@props(['active' => false])
@php
    $classes = 'block text-left px-3 leading-6 hover:bg-blue-500 focus:bg-blue-500 text-sm hover:text-white';
    if ($active) $classes .= ' bg-blue-600 text-white ';
@endphp
<a {{ $attributes(['class' => $classes]) }}>
   {{ $slot }}
</a>
