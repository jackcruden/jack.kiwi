<x-layout.page :title="$title">
    @auth
        <x-slot:action>
            <x-button :href="route('posts.create')">Create a Post</x-button>
        </x-slot:action>
    @endauth

    <div>
        @if ($posts->isNotEmpty())
            @if ($posts->first()->type === App\Models\PostType::Blog)
                <x-card-list>
                    @foreach($posts as $post)
                        <x-card.blog :blog="$post" />
                    @endforeach
                </x-card-list>
            @elseif ($posts->first()->type === App\Models\PostType::Project)
                <x-card-grid>
                    @foreach($posts as $post)
                        <x-card.project :project="$post" />
                    @endforeach
                </x-card-grid>
            @elseif ($posts->first()->type === App\Models\PostType::Sketch)
                <x-card-grid>
                    @foreach($posts as $post)
                        <x-card.sketch :sketch="$post" />
                    @endforeach
                </x-card-grid>
            @endif
        @endif
    </div>
</x-layout.page>
