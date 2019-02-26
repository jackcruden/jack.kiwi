@extends('layouts.app')

@section('head')
    <meta property="og:url"         content="{{ $project->link }}" />
    <meta property="og:type"        content="article" />
    <meta property="og:title"       content="{{ $project->title }}" />
    <meta property="og:description" content="{!! $project->snippet !!}" />
    @if ($project->image)
        <meta property="og:image" content="{{ config('app.url').'/storage/'.$project->image }}" />
    @else
        <meta property="og:image" content="{{ config('app.url').'/images/kiwifruit_white.png' }}" />
    @endif
@endsection

@section('title', $project->title)

@section('content')
    @if ($project->image)
        <img src="/storage/{{ $project->image }}" alt="{{ $project->title }}" class="rounded-lg" style="max-height: 420px;">
    @endif

    <h1>
        <a href="/projects/{{ $project->slug }}">
            {{ $project->title }}
        </a>
    </h1>
    <p class="text-grey-dark">{{ $project->published_at_human }}</p>

    <div class="mt-4">
        {!! $project->rendered !!}
    </div>

    @if (App\Tag::whereSlug($project->slug)->first()->posts()->whereNotNull('published_at')->count())
        <h2 class="mt-8 mb-3">More about {{ $project->title }}&hellip;</h2>

        <div class="flex flex-wrap -m-2">
            @foreach(App\Tag::whereSlug($project->slug)->first()->posts()->whereNotNull('published_at')->get() as $post)
                <div class="w-full">
                    @component('post', compact('post'))
                    @endcomponent
                </div>
            @endforeach
        </div>
    @endif
@endsection
