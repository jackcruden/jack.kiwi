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

            <a href="mailto:jackcruden@gmail.com" target="_blank" class="px-3 py-2 inline-block rounded-lg text-xl bg-green text-white hover:text-green hover:bg-white border-4 border-green">
                Available for hire!
            </a>

            <div class="text-xl mt-4">
                <ul class="list-reset font-mono">
                    @foreach(App\Tag::all() as $tag)
                        <li class="inline-block my-1 p-1 px-2 rounded-lg border-4 border-green">
                            <a href="/tags/{{ $tag->slug }}" class="text-green hover:text-green">
                                {{ $tag->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="flex-1 h-full overflow-y-scroll lg:overflow-y-visible px-3">
            <div class="my-4">
                <h2 class="mb-3">Projects</h2>

                <div class="flex flex-wrap -m-2">
                    @foreach(App\Project::all() as $project)
                        <div class="w-1/3">
                            <a href="/blog/{{ $project->slug }}" class="x-project">
                                <span>{{ $project->title }}</span><br>
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
                            <span>{{ $post->title }}</span>
                            <small class="text-grey-dark">{{ $post->published_at_human }}</small>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
