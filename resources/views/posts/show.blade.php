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
        <div class="bg-white shadow rounded-lg">
            @if ($post->embed_url)
                <embed id="RefFrame" src="{{ $post->embed_url }}" onload="AdjustIFrame('RefFrame');" style="" />
            @endif
        </div>

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
                    <ul class="list-reset">
                        @foreach($post->tags as $tag)
                            <li class="x-tag">
                                <a href="/tags/{{ $tag->slug }}">{{ $tag->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                @endif

                <div class="mt-4 prose lg:prose-lg xl:prose-xl">
                    {!! $post->rendered !!}
                </div>
            </div>
        </div>

        @if (App\Models\Tag::whereSlug($post->slug)->first())
            @if (App\Models\Tag::findBySlug($post->slug)->posts()->blog()->published()->count())
                <h2 class="mt-8 mb-3">More about {{ $post->title }}&hellip;</h2>

                <div class="flex flex-wrap -m-2">
                    @foreach (App\Models\Tag::findBySlug($post->slug)->posts()->blog()->published()->get() as $post)
                        <div class="w-full">
                            @component ('post', compact('post'))
                            @endcomponent
                        </div>
                    @endforeach
                </div>
            @endif
        @endif

        <x-subscribe />
    </div>
</x-layout.page>
