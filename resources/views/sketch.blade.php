<a href="/sketches/{{ $sketch->slug }}" class="x-item overflow-hidden">

    @if ($sketch->image)
        <img class="block" src="/storage/{{ $sketch->image_thumbnail }}" alt="{{ $sketch->title }}">
    @endif
</a>
