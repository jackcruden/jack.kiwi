@props(['tag'])

<div {{ $attributes->class(
    'inline-block my-1 p-1 px-3 rounded-full bg-green-500 hover:shadow-lg transition hover:scale-105'
) }}>
    <a href="/tags/{{ $tag->slug }}" class="text-white font-medium hover:text-white">
        {{ $tag->name }}
    </a>
</div>
