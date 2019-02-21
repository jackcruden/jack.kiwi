@extends('layouts.app')

@section('app')
    <div class="mt-6 mx-3 md:w-3/4 lg:w-2/3 md:mx-auto">
        <div class="mb-4">
            <h1 class="mb-2">
                <a href="/projects/{{ $post->slug }}">
                    {{ $post->title }}
                </a>
            </h1>

            @if ($post->published_at)
                <p class="text-grey-dark">{{ $post->published_at_human }}</p>
            @endif

            @if ($post->tags)
                <ul class="list-reset mt-2 font-mono">
                    @foreach($post->tags as $tag)
                        <li class="inline-block my-1 p-1 px-2 rounded-lg border-2 border-green">
                            <a href="/tags/{{ $tag->slug }}" class="text-green hover:text-green">
                                {{ $tag->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="x-post">
            {!! $post->rendered !!}
        </div>

        {{-- <h2 class="mt-8 mb-3">More about {{ $project->title }}&hellip;</h2>

        <div class="flex flex-wrap -m-2">
            @foreach(App\Tag::whereSlug($project->slug)->first()->posts as $post)
            <div class="w-full">
                <a href="/blog/{{ $post->slug }}" class="x-project">
                    <span>{{ $post->title }}</span>
                    <small class="text-grey-dark">{{ $post->published_at_human }}</small>
                </a>
            </div>
            @endforeach
        </div> --}}
    </div>
@endsection
