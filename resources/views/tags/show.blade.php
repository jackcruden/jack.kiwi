@extends('layouts.app')

@section('app')
    <div class="w-3/4 mx-auto m-6">
        <div class="mb-4">
            <h1>
                <a href="/tags/{{ $tag->slug }}">
                    <span class="text-grey-dark">Tag:</span>
                    {{ $tag->name }}
                </a>
            </h1>
        </div>

        @if ($tag->project()->published()->count())
            <h2>Project</h2>
            <div class="flex flex-wrap -m-2">
                @foreach($tag->project()->published()->get() as $project)
                    <div class="w-1/3">
                        <a href="/projects/{{ $project->slug }}" class="x-project">
                            <span class="font-medium">{{ $project->title }}</span><br>
                            <small class="text-grey-dark">{{ $project->published_at_human }}</small>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif

        <h2>Blog Posts</h2>
        @if ($tag->posts()->published()->count())
            <div class="flex flex-wrap -m-2">
                @foreach($tag->posts()->published()->get() as $post)
                    <div class="w-full">
                        <a href="/blog/{{ $post->slug }}" class="x-project">
                            <span class="font-medium">{{ $post->title }}</span>

                            <small class="text-grey-dark">
                                {{ $post->published_at_human }}
                            </small>

                            <div class="mt-2 text-sm text-grey-dark">
                                {{ $post->snippet }}
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <p>No blog posts found.</p>
        @endif
    </div>
@endsection
