@php
    $tag = isset($href) ? 'a' : 'button';
@endphp

<{{ $tag }} {{ $attributes->merge([
    'type' => $tag !== 'a' ? 'button' : '',
    'class' => 'inline-block px-6 py-3 rounded-lg shadow text-white hover:text-white font-medium bg-green-500 select-none whitespace-nowrap',
]) }}>
    {{ $slot }}
</{{ $tag }}>
