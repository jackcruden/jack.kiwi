@extends('layouts.app')

@section('title', $tag->name)

@section('content')
    @if ($tag->is_visible)
        <h1>
            <a href="/tags/{{ $tag->slug }}">
                <span class="text-grey-dark">Tag:</span>
                {{ $tag->name }}
            </a>
        </h1>
    @endif

    @if ($tag->posts()->project()->published()->count())
        <h1>Projects</h1>
        <div class="flex flex-wrap -m-2">
            @foreach($tag->posts()->project()->published()->get() as $project)
                <div class="w-full sm:w-1/2 md:w-1/3">
                    @component('project', compact('project'))
                    @endcomponent
                </div>
            @endforeach
        </div>
    @endif

    @if ($tag->posts()->sketch()->published()->count())
        <h1>Sketches</h1>
        <div class="flex flex-wrap -m-2">
            @foreach($tag->posts()->sketch()->published()->get() as $sketch)
                <div class="w-1/2 sm:w-1/3 md:w-1/4">
                    @component('sketch', compact('sketch'))
                    @endcomponent
                </div>
            @endforeach
        </div>
    @endif

    @if ($tag->posts()->blog()->published()->count())
        <h1>Blog Posts</h1>
        <div class="flex flex-wrap -m-2">
            @foreach($tag->posts()->blog()->published()->get() as $post)
                <div class="w-full">
                    @component('post', compact('post'))
                    @endcomponent
                </div>
            @endforeach
        </div>
    @endif
@endsection
