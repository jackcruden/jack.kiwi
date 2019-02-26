@extends('layouts.app')

@section('title', 'Blog')

@section('content')
    <h1>Blog</h1>

    <div class="flex flex-wrap -m-2">
        @foreach(App\Post::published()->get() as $post)
            <div class="w-full">
                @component('post', compact('post'))
                @endcomponent
            </div>
        @endforeach
    </div>
@endsection
