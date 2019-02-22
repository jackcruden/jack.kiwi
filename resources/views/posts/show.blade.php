@extends('layouts.app')

@section('head')
    <meta property="og:url"         content="{{ $post->link }}" />
    <meta property="og:type"        content="article" />
    <meta property="og:title"       content="{{ $post->title }}" />
    <meta property="og:description" content="{!! strip_tags($post->snippet) !!}" />
    <meta property="og:image" content="{{ config('app.url').'/images/kiwifruit_white.png' }}" />
@endsection

@section('title', $post->title)

@section('content')
    <h1>
        @if ($post->published_at)
            <a href="/blog/{{ $post->slug }}">
                {{ $post->title }}
            </a>
        @else
            {{ $post->title }}
        @endif
    </h1>

    @if ($post->published_at)
        <p class="text-grey-dark">{{ $post->published_at_human }}</p>
    @endif

    @if ($post->tags)
        <ul class="list-reset">
            @foreach($post->tags as $tag)
                <li class="inline-block my-1 p-1 px-2 rounded-lg border-2 border-green">
                    <a href="/tags/{{ $tag->slug }}" class="text-green hover:text-green-dark font-medium">
                        {{ $tag->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif

    <div class="mt-4">
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
@endsection
