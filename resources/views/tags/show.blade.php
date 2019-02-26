@extends('layouts.app')

@section('title', $tag->name)

@section('content')
    <h1>
        <a href="/tags/{{ $tag->slug }}">
            <span class="text-grey-dark">Tag:</span>
            {{ $tag->name }}
        </a>
    </h1>

    @if ($tag->project()->published()->count())
        <h2>Project</h2>
        <div class="flex flex-wrap -m-2">
            @foreach($tag->project()->published()->get() as $project)
                <div class="w-1/3">
                    @component('project', compact('project'))
                    @endcomponent
                </div>
            @endforeach
        </div>
    @endif

    <h2>Blog Posts</h2>
    @if ($tag->posts()->published()->count())
        <div class="flex flex-wrap -m-2">
            @foreach($tag->posts()->published()->get() as $post)
                <div class="w-full">
                    @component('post', compact('post'))
                    @endcomponent
                </div>
            @endforeach
        </div>
    @else
        <p>No blog posts found.</p>
    @endif
@endsection
