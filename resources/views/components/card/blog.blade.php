@props(['blog'])

<x-card>
    <a href="{{ $blog->link }}" class="flex-wrap overflow-hidden">
        <div class="p-3 flex-1">
            <span class="font-medium">
                {{ $blog->title }}
            </span>

            <small class="text-grey-dark">
                <br class="md:hidden">
                {{ $blog->published_at_human }}
            </small>

            <small class="whitespace-no-wrap md:float-right text-grey-dark">
                <span class="md:hidden">&nbsp;&middot;&nbsp;</span>
                {{ $blog->minutes_to_read }} minute read
            </small>

            <div class="mt-2 text-sm text-grey-dark">
                {!! strip_tags($blog->snippet) !!}
            </div>
        </div>

        @if ($blog->image)
            <div class="x-item-image w-full sm:w-1/5" style="
                max-width: 100px;
                background-image: url('/storage/{{ $blog->image_thumbnail }}');
            ">
            </div>
        @endif
    </a>
</x-card>
