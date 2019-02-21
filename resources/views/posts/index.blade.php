@extends('layouts.app')

@section('content')
    <h1>Blog Posts</h1>

    <div class="flex flex-wrap -m-2">
        @foreach(App\Post::published()->get() as $post)
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
@endsection
