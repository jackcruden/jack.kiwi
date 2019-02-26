@extends('layouts.app')

@section('title', 'Blog')

@section('content')
    <h1>Blog</h1>

    <div class="flex flex-wrap -m-2">
        @foreach(App\Post::published()->get() as $post)
            <div class="w-full">
                <a href="/blog/{{ $post->slug }}" class="x-project">
                    <span class="font-medium">{{ $post->title }}</span>

                    <small class="text-grey-dark">
                        <br class="md:hidden">
                        {{ $post->published_at_human }}
                    </small>

                    <small class="whitespace-no-wrap md:float-right text-grey-dark">
                        <span class="md:hidden">&nbsp;&middot;&nbsp;</span>
                        {{ $post->minutes_to_read }} minute read
                    </small>

                    <div class="mt-2 text-sm text-grey-dark">
                        {{ $post->snippet }}
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
