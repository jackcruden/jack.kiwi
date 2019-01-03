@extends('layouts.app')

@section('app')
    <div class="w-3/4 mx-auto m-6">
        <div class="mb-4">
            <h1>Tag: {{ $tag->name }}</h1>
        </div>

        <div>
            @if($tag->project)
                There is a project called {{ $tag->project->title }}.
            @endif

            <p>These are the posts...</p>
            @foreach($tag->posts as $post)
                {{ $post->title }}
            @endforeach
        </div>
    </div>
@endsection
