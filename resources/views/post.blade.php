<a href="/blog/{{ $post->slug }}" class="x-item flex-wrap" style="display: flex !important;">
    <div class="p-3 flex-1">
        <span class="font-medium">
            {{ $post->title }}
        </span>

        <small class="text-grey-dark">
            <br class="md:hidden">
            {{ $post->published_at_human }}
        </small>

        <small class="whitespace-no-wrap md:float-right text-grey-dark">
            <span class="md:hidden">&nbsp;&middot;&nbsp;</span>
            {{ $post->minutes_to_read }} minute read
        </small>

        <div class="mt-2 text-sm text-grey-dark">
            {{ $post->snippet }}
        </div>
    </div>

    @if ($post->image)
        <div class="x-item-image w-full sm:w-1/5" style="
            min-width: 250px;
            background-image: url('/storage/{{ $post->image }}');
        ">
        </div>
    @endif
</a>
