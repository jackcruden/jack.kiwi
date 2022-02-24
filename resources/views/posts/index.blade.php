<x-layout.page title="Blog">
    <x-slot:action>
        <x-button :href="route('posts.create')">Create a Post</x-button>
    </x-slot:action>

    <div class="flex flex-wrap -m-2">
        @foreach(App\Models\Post::published()->get() as $post)
            <div class="w-full">
                <x-post :post="$post" />
            </div>
        @endforeach
    </div>
</x-layout.page>
