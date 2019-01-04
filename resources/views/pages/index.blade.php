@extends('layouts.app')

@section('app')
    <div class="flex flex-wrap lg:h-screen">
        <div class="w-full lg:max-w-sm self-center p-4">
            <div class="mb-2 text-3xl">
                <h1>Hi, I'm Jack.</h1>
            </div>

            <div class="mb-3 text-2xl">
                <p>I'm a full-stack web developer living and working between England and New Zealand.</p>
            </div>

            <a href="mailto:jackcruden@gmail.com" target="_blank" class="px-3 py-2 inline-block rounded text-xl bg-green font-mono text-white hover:text-white">
                Available for hire!
            </a>

            {{-- <div class="text-xl">
                <ul class="list-reset x-list-label font-mono">
                    @foreach(App\Tag::all() as $tag)
                        <li>
                            <a href="/tags/{{ $tag->slug }}" class="text-white hover:text-white">
                                {{ $tag->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div> --}}
        </div>

        <div class="flex-1 h-screen overflow-y-scroll">
            <div class="my-4">
                <h2>Projects</h2>

                @foreach(App\Project::all() as $project)
                    <a href="/blog/{{ $project->slug }}" class="x-project">
                        <span>{{ $project->title }}</span>
                        <small class="text-grey-dark">{{ $project->published_at_human }}</small>
                    </a>
                @endforeach
            </div>

            <div>
                <h2>Blog Posts</h2>

                @foreach(App\Post::published()->get() as $post)
                    <a href="/blog/{{ $post->slug }}" class="x-project">
                        <span>{{ $post->title }}</span>
                        <small class="text-grey-dark">{{ $post->published_at_human }}</small>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
