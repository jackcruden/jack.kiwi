@php
    if (request()->post) {
        $post = request()->post;
    }
@endphp

@extends('layouts.app')

@section('head')
    <meta property="og:url"         content="{{ $post->link }}" />
    <meta property="og:type"        content="article" />
    <meta property="og:title"       content="{{ $post->title }}" />
    <meta property="og:description" content="{!! strip_tags($post->snippet) !!}" />
    @if ($post->image)
        <meta property="og:image" content="{{ config('app.url').'/storage/'.$post->image }}" />
    @else
        <meta property="og:image" content="{{ config('app.url').'/images/kiwifruit_white.png' }}" />
    @endif
@endsection

@section('title', $post->title)

@section('content')
    @if ($post->embed_url)
        <div class="text-center">
            <embed src="{{ $post->embed_url }}" class="block rounded-lg border-4 w-full" style="height: 70vh;">
        </div>
    @elseif ($post->image)
        <div class="text-center">
            <img src="/storage/{{ $post->image }}" alt="{{ $post->title }}" class="inline-block rounded-lg border-4" style="max-height: 420px;">
        </div>
    @endif

    <h1>
        @if ($post->published_at)
            <a href="{{ $post->link }}">
                {{ $post->title }}
            </a>
        @else
            {{ $post->title }}
        @endif
    </h1>

    @if ($post->published_at)
        <p class="text-grey-dark">
            {{ $post->published_at_human }}
            &nbsp;&middot;&nbsp;
            {{ $post->minutes_to_read }} minute read
        </p>
    @endif

    @if ($post->tags)
        <ul class="list-reset">
            @foreach($post->tags()->visible()->get() as $tag)
                <li class="inline-block my-1 p-1 px-2 rounded-lg border-2 border-green">
                    <a href="/tags/{{ $tag->slug }}" class="text-green hover:text-green-dark font-medium">
                        {{ $tag->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif

    <div class="mt-4 image-container">
        {!! $post->rendered !!}
    </div>

    @if (App\Tag::whereSlug($post->slug)->first())
        @if (App\Tag::findBySlug($post->slug)->posts()->blog()->published()->count())
            <h2 class="mt-8 mb-3">More about {{ $post->title }}&hellip;</h2>

            <div class="flex flex-wrap -m-2">
                @foreach (App\Tag::findBySlug($post->slug)->posts()->blog()->published()->get() as $post)
                    <div class="w-full">
                        @component ('post', compact('post'))
                        @endcomponent
                    </div>
                @endforeach
            </div>
        @endif
    @endif

    <div class="mt-8 p-4 border-2 border-dashed rounded-lg">
        <h3 class="mt-0">
            Want to see more like this?
            <span class="text-grey font-normal">I only post updates once every few weeks.</span>
        </h3>

        <form action="https://kiwi.us6.list-manage.com/subscribe/post?u=5d6e9c88ec0a7716ac9b57c10&amp;id=db10343ba1" method="post" target="_blank"
            class="flex">
            <div class="flex-1 mr-2">
                <input type="email" name="EMAIL" class="x-input" placeholder="Email address" required>
            </div>

            <div>
                <div style="position: absolute; left: -5000px;" aria-hidden="true">
                    <input type="text" name="b_5d6e9c88ec0a7716ac9b57c10_db10343ba1" tabindex="-1" value="">
                </div>

                <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="x-button">
            </div>
        </form>
    </div>
@endsection
