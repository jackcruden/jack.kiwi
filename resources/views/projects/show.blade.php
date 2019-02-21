@extends('layouts.app')

@section('app')
    <div class="mt-6 mx-3 md:w-3/4 lg:w-2/3 md:mx-auto">
        <div class="mb-4">
            <h1 class="mb-2">
                <a href="/projects/{{ $project->slug }}">
                    {{ $project->title }}
                </a>
            </h1>
            <p class="text-grey-dark">{{ $project->published_at_human }}</p>
        </div>

        <div class="x-post">
            {!! $project->rendered !!}
        </div>

        @if (App\Tag::whereSlug($project->slug)->first()->posts()->whereNotNull('published_at')->count())
            <h2 class="mt-8 mb-3">More about {{ $project->title }}&hellip;</h2>

            <div class="flex flex-wrap -m-2">
                @foreach(App\Tag::whereSlug($project->slug)->first()->posts()->whereNotNull('published_at')->get() as $post)
                    <div class="w-full">
                        <a href="/blog/{{ $post->slug }}" class="x-project">
                            <span>{{ $post->title }}</span>
                            <small class="text-grey-dark">{{ $post->published_at_human }}</small>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
