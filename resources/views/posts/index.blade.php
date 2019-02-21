@extends('layouts.app')

@section('app')
    <div class="w-3/4 mx-auto m-6">
        <div class="mb-4">
            <h1>Blog Posts</h1>
        </div>

        <div class="flex flex-wrap -m-2">
            @foreach(App\Post::published()->get() as $post)
            <div class="w-full">
                <a href="/blog/{{ $post->slug }}" class="x-project">
                    <strong>{{ $post->title }}</strong>

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
    </div>
@endsection
