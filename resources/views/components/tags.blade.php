@props(['tags'])

<ul {{ $attributes->class('list-reset -m-2') }}>
    @foreach ($tags as $tag)
        <x-tag :tag="$tag" />
    @endforeach
</ul>
