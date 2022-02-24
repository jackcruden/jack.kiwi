@php
    $tag = isset($href) ? 'a' : 'button';
@endphp

<{{ $tag }} {{ $attributes->merge([
    'type' => $tag !== 'a' ? 'button' : '',
    'class' => 'inline-block px-3 py-2 rounded-lg shadow text-white font-medium bg-green-500 select-none',
]) }}>
    {{ $slot }}
</{{ $tag }}>
