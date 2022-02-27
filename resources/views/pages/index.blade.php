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
            <div class="text-xl md:text-6xl font-extrabold">
                <h1>Hi, I'm Jack.</h1>
            </div>

            <p class="text-lg md:text-xl">
                I'm a full-stack web developer and creative coder from Taranaki, New Zealand.
            </p>

            <div class="lg:text-xl mt-4">
                <x-tags :tags="App\Models\Tag::all()" />
            </div>
        </div>

        <div class="flex-1">
            <x-home.section heading="Projects">
                <x-card-grid>
                    @foreach (App\Models\Post::project()->published()->limit(6)->get() as $project)
                        <x-card.project :project="$project" />
                    @endforeach
                </x-card-grid>
            </x-home.section>

            <x-home.section heading="Sketches">
                <x-card-grid>
                    @foreach(App\Models\Post::sketch()->published()->limit(6)->get() as $sketch)
                        <x-card.sketch :sketch="$sketch" />
                    @endforeach
                </x-card-grid>
            </x-home.section>

            <x-home.section heading="Blog">
                <x-card-list>
                    @foreach(App\Models\Post::blog()->published()->limit(6)->get() as $blog)
                        <x-card.blog :blog="$blog" />
                    @endforeach
                </x-card-list>
            </x-home.section>
        </div>
    </div>
</x-layout>
