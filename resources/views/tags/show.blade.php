<x-layout.page :title="$tag->name">
    @if ($tag->posts()->project()->published()->count())
        <h1>Projects</h1>
        <div class="flex flex-wrap -m-2">
            @foreach($tag->posts()->project()->published()->get() as $project)
                <div class="w-full sm:w-1/2 md:w-1/3">
                    <x-project :project="$project" />
                </div>
            @endforeach
        </div>
    @endif

    @if ($tag->posts()->sketch()->published()->count())
        <h1>Sketches</h1>
        <div class="flex flex-wrap -m-2">
            @foreach($tag->posts()->sketch()->published()->get() as $sketch)
                <div class="w-1/2 sm:w-1/3 md:w-1/4">
                    <x-sketch :sketch="$sketch" />
                </div>
            @endforeach
        </div>
    @endif

    @if ($tag->posts()->blog()->published()->count())
        <h1>Blog Posts</h1>
        <div class="flex flex-wrap -m-2">
            @foreach($tag->posts()->blog()->published()->get() as $post)
                <div class="w-full">
                    <x-post :post="$post" />
                </div>
            @endforeach
        </div>
    @endif
</x-layout.page>
