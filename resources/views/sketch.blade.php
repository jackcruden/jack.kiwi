<a href="/sketches/{{ $sketch->slug }}" class="x-item overflow-hidden">
    {{-- <div class="p-3">
        <span class="font-medium">{{ $sketch->title }}</span><br>
        <small class="text-grey-dark">{{ $sketch->published_at_human }}</small>
    </div> --}}

    @if ($sketch->image)
        <img class="block" src="/storage/{{ $sketch->image }}">
        {{-- <div class="x-item-image" style="background-image: url('/storage/{{ $sketch->image }}');"></div> --}}
    @endif
</a>
