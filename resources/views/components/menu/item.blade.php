@props(['label', 'url', 'active'])

<li class="inline-block">
    <a href="{{ $url }}" @class([
        'block py-4 px-4 text-green-600 font-medium',
        'border-b-4 border-green-500' => $active,
    ])>
        {{ $label }}
    </a>
</li>
