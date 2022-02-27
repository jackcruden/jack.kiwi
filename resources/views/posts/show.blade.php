<x-layout.page>
    <x-slot:head>
        <meta property="og:url" content="{{ $post->link }}"/>
        <meta property="og:type" content="article"/>
        <meta property="og:title" content="{{ $post->title }}"/>
        <meta property="og:description" content="{!! strip_tags($post->snippet) !!}"/>
        @if ($post->image)
            <meta property="og:image" content="{{ config('app.url').'/storage/'.$post->image }}"/>
        @else
            <meta property="og:image" content="{{ config('app.url').'/images/kiwifruit_white.png' }}"/>
        @endif
    </x-slot:head>

    <div class="space-y-4">
        @if ($post->embed_url)
            <embed
                src="{{ $post->embed_url }}"
                class="bg-white mx-auto shadow rounded-lg text-center w-full"
                style="min-height: 70vh; max-height: 70vh;"
            />
        @elseif ($post->getFirstMedia('cover'))
            <img
                src="{{ $post->cover_url }}"
                alt="{{ $post->title }}"
                class="bg-white mx-auto shadow rounded-lg text-center w-auto"
                style="max-height: 70vh;"
            />
        @endif

        <div class="bg-white shadow rounded-lg">
            <div class="p-6">
                <div class="flex justify-between mb-4">
                    <div>
                        <div class="text-3xl pt-1 font-extrabold">
                            @if ($post->published_at)
                                <a href="{{ $post->link }}">
                                    {{ $post->title }}
                                </a>
                            @else
                                {{ $post->title }}
                            @endif
                        </div>

                        @if ($post->published_at)
                            <p class="text-grey-dark">
                                {{ $post->published_at_human }}
                                &nbsp;&middot;&nbsp;
                                {{ $post->minutes_to_read }} minute read
                            </p>
                        @endif
                    </div>

                    <div>
                        @auth
                            <x-button href="{{ route('posts.edit', $post) }}">Edit Post</x-button>
                        @endauth
                    </div>
                </div>

                @if ($post->tags)
                    <x-tags :tags="$post->tags" />
                @endif

                <div class="mt-4 prose lg:prose-lg xl:prose-xl">
                    {!! $post->rendered !!}
                </div>
            </div>
        </div>

        @if (App\Models\Tag::whereSlug($post->slug)->first())
            @if (App\Models\Tag::findBySlug($post->slug)->posts()->blog()->published()->count())
                <x-home.section heading="More about {{ $post->title }}...">
                    <x-card-grid>
                        @foreach (App\Models\Tag::findBySlug($post->slug)->posts()->blog()->published()->get() as $post)
                            <x-card.blog :blog="$post" />
                        @endforeach
                    </x-card-grid>
                </x-home.section>
            @endif
        @endif

        <x-subscribe />
    </div>
</x-layout.page>
