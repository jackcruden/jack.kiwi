<form wire:submit.prevent="submit" class="space-y-2">
    <div>
        <x-input.text wire:model="title" placeholder="Enter a title" />
        <div class="font-mono text-sm">
            {{ route('home').'/posts/'.$this->slug }}
        </div>
    </div>

    <x-input.text wire:model="embedUrl" placeholder="Enter a URL to embed" />

    <div>
        <div class="w-full p-2 border-4 bg-white rounded-lg">
            <x-card-grid>
                @if ($post?->getFirstMedia('cover'))
                    <div wire:key="media-{{ $post->getFirstMedia('cover')->getKey() }}">
                        {{ $post->getFirstMedia('cover') }}
                        <x-button onclick="navigator.clipboard.writeText('![]({{ $post->getFirstMedia('cover')->getFullUrl() }})')">Copy</x-button>
                        <x-button wire:click="delete({{ $post->getFirstMedia('cover')->getKey() }})">Delete</x-button>
                    </div>
                @endif
            </x-card-grid>
        </div>

        <input id="choose-cover" type="file" wire:model="cover" class="hidden" />
        <x-button onclick="document.getElementById('choose-cover').click()" type="button">Add Cover</x-button>
    </div>

    <x-input.select wire:model="type">
        @foreach (App\Models\PostType::cases() as $case)
            <option value="{{ $case->value }}" @selected($case === $post?->type)>{{ $case->value }}</option>
        @endforeach
    </x-input.select>

    <x-input.markdown wire:model="content" :value="json_encode($content)" />

    <div class="w-full p-2 border-4 bg-white rounded-lg">
        <x-card-grid>
            @if ($post)
                @foreach ($post->getMedia('images') as $media)
                    <div wire:key="media-{{ $media->getKey() }}">
                        {{ $media }}
                        <x-button onclick="navigator.clipboard.writeText('![]({{ $media->getFullUrl() }})')">Copy</x-button>
                        <x-button wire:click="delete({{ $media->getKey() }})">Delete</x-button>
                    </div>
                @endforeach
            @endif
        </x-card-grid>
    </div>

    <input id="choose-images" type="file" wire:model="images" class="hidden" multiple />
    <x-button onclick="document.getElementById('choose-images').click()" type="button">Add Images</x-button>
    <x-button type="submit">{{ $post ? 'Update Post' : 'Create Post' }}</x-button>
</form>
