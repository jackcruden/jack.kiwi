@props(['title', 'date' => null, 'url', 'image' => null])

<a
    {{ $attributes->class([
        'block m-2 bg-white shadow rounded-lg',
    ]) }}
    href="{{ $url }}"
>
    <div class="p-3">
        <span class="font-medium">{{ $title }}</span><br>
        <small class="text-grey-dark">{{ $date }}</small>
    </div>

    @if ($image)
{{--        <div class="x-item-image" style="background-image: url('/storage/{{ $project->image_thumbnail }}')"></div>--}}
    @endif

    {{ $slot }}
</a>
