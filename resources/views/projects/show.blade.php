@extends('layouts.app')

@section('title', $project->title)

@section('content')
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
                    <a href="/blog/{{ $post->slug }}" class="x-project">
                        <span class="font-medium">{{ $post->title }}</span>
                        <small class="text-grey-dark">{{ $post->published_at_human }}</small>
                    </a>
                </div>
            @endforeach
        </div>
    @endif
@endsection
