<x-layout.page :title="'Tag: '.$tag->name">
    @if ($tag->posts()->project()->published()->count())
        <x-home.section heading="Projects">
            <x-card-grid>
                @foreach($tag->posts()->project()->published()->get() as $project)
                    <x-card.project :project="$project" />
                @endforeach
            </x-card-grid>
        </x-home.section>
    @endif

    @if ($tag->posts()->sketch()->published()->count())
        <x-home.section heading="Sketches">
            <x-card-grid>
                @foreach($tag->posts()->sketch()->published()->get() as $sketch)
                    <x-card.sketch :sketch="$sketch" />
                @endforeach
            </x-card-grid>
        </x-home.section>
    @endif

    @if ($tag->posts()->blog()->published()->count())
        <x-home.section heading="Blog">
            <x-card-list>
                @foreach($tag->posts()->blog()->published()->get() as $blog)
                    <x-card.blog :blog="$blog" />
                @endforeach
            </x-card-list>
        </x-home.section>
    @endif
</x-layout.page>
