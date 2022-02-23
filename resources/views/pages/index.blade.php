<x-layout>
    <x-slot:title>
        Jack Cruden's portfolio & blog
    </x-slot:title>

    <x-slot:head>
        <meta property="og:url" content="{{ config('app.url') }}"/>
        <meta property="og:type" content="article"/>
        <meta property="og:title" content="Jack Cruden's portfolio & blog - jack.kiwi"/>
        <meta property="og:description" content="Jack Cruden's portfolio & blog"/>
        <meta property="og:image" content="{{ config('app.url').'/images/kiwifruit_white.png' }}"/>
    </x-slot:head>

    <div class="flex flex-wrap container mx-auto">
        <div class="w-full lg:max-w-sm self-center p-4">
            <div class="text-xl md:text-3xl">
                <h1>Hi, I'm Jack.</h1>
            </div>

            <p class="text-lg md:text-xl">
                I'm a full-stack web developer and creative coder from Taranaki, New Zealand.
            </p>

            <div class="lg:text-xl mt-4">
                <ul class="list-reset">
                    @foreach(App\Models\Tag::visible()->get() as $tag)
                        <li class="inline-block p-2 px-3 rounded-full bg-green hover:shadow">
                            <a href="/tags/{{ $tag->slug }}" class="text-white font-medium hover:text-white">
                                {{ $tag->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="flex-1 lg:overflow-y-scroll px-3">
            <div class="my-4">
                <h1 class="mb-3">Projects</h1>

                <div class="flex flex-wrap -m-2">
                    @foreach (App\Models\Post::project()->published()->get() as $project)
                        <div class="w-full md:w-1/2 xl:w-1/3">
                            <x-project :project="$project" />
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="my-4">
                <h1 class="mb-3">Sketches</h1>

                <div class="flex flex-wrap -m-2">
                    @foreach(App\Models\Post::sketch()->published()->get() as $sketch)
                        <div class="w-1/2 sm:w-1/4 lg:w-1/3 xl:w-1/4">
                            <x-sketch :sketch="$sketch" />
                        </div>
                    @endforeach
                </div>
            </div>

            <div>
                <h1 class="mb-3">Blog</h1>

                <div class="flex flex-wrap -m-2">
                    @foreach(App\Models\Post::blog()->published()->get() as $post)
                        <div class="w-full">
                            <x-post :post="$post" />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-layout>
