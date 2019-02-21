@extends('layouts.app')

@section('app')
    <div class="flex flex-wrap container mx-auto" style="min-height: calc(100vh - 54px);">
        <div class="w-full lg:max-w-sm self-center p-4">
            <div class="text-xl md:text-3xl">
                <h1>Hi, I'm Jack.</h1>
            </div>

            <p class="text-lg md:text-xl">I'm a full-stack web developer living and working between England and New Zealand.</p>

            <div class="lg:text-xl mt-4">
                <ul class="list-reset">
                    @foreach(App\Tag::all() as $tag)
                        <li class="inline-block my-1 p-1 px-2 rounded-lg bg-green">
                            <a href="/tags/{{ $tag->slug }}" class="text-white hover:text-white font-medium">
                                {{ $tag->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="flex-1 lg:overflow-y-scroll px-3 pb-12" style="height: calc(100vh - 54px);">
            <div class="my-4">
                <h2 class="mb-3">Projects</h2>

                <div class="flex flex-wrap -m-2">
                    @foreach(App\Project::published()->get() as $project)
                        <div class="w-full lg:w-1/3">
                            <a href="/projects/{{ $project->slug }}" class="x-project">
                                <span class="font-medium">{{ $project->title }}</span><br>
                                <small class="text-grey-dark">{{ $project->published_at_human }}</small>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <div>
                <h2 class="mb-3">Blog Posts</h2>

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
            </div>
        </div>
    </div>
@endsection
