@extends('layouts.app')

@section('head')
    <meta property="og:url"         content="{{ config('app.url') }}" />
    <meta property="og:type"        content="article" />
    <meta property="og:title"       content="Jack Cruden's portfolio & blog - jack.kiwi" />
    <meta property="og:description" content="Jack Cruden's portfolio & blog" />
    <meta property="og:image" content="{{ config('app.url').'/images/kiwifruit_white.png' }}" />
@endsection

@section('title', 'Jack Cruden\'s portfolio & blog')

@section('app')
    <div class="flex flex-wrap container mx-auto" style="min-height: calc(100vh - 55px);">
        <div class="w-full lg:max-w-sm self-center p-4">
            <div class="text-xl md:text-3xl">
                <h1>Hi, I'm Jack.</h1>
            </div>

            <p class="text-lg md:text-xl">
                I'm a full-stack web developer and creative coder from Taranaki, New Zealand.
            </p>

            <div class="lg:text-xl mt-4">
                <ul class="list-reset">
                    @foreach(App\Tag::visible()->get() as $tag)
                        <li class="x-tag">
                            <a href="/tags/{{ $tag->slug }}">
                                {{ $tag->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="flex-1 lg:overflow-y-scroll px-3" style="height: calc(100vh - 55px);">
            <div class="my-4">
                <h1 class="mb-3">Projects</h1>

                <div class="flex flex-wrap -m-2">
                    @foreach(App\Post::project()->published()->get() as $project)
                        <div class="w-full md:w-1/2 xl:w-1/3">
                            @component('project', compact('project'))
                            @endcomponent
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="my-4">
                <h1 class="mb-3">Sketches</h1>

                <div class="flex flex-wrap -m-2">
                    @foreach(App\Post::sketch()->published()->get() as $sketch)
                        <div class="w-1/2 sm:w-1/4 lg:w-1/3 xl:w-1/4">
                            @component('sketch', compact('sketch'))
                            @endcomponent
                        </div>
                    @endforeach
                </div>
            </div>

            <div>
                <h1 class="mb-3">Blog</h1>

                <div class="flex flex-wrap -m-2">
                    @foreach(App\Post::blog()->published()->get() as $post)
                        <div class="w-full">
                            @component('post', compact('post'))
                            @endcomponent
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
