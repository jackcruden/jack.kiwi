<form wire:submit.prevent="submit" class="space-y-2">
    <div>
        <x-input.text wire:model="title" placeholder="Enter a title" />
        <div class="font-mono text-sm">
            {{ route('home').'/posts/'.$this->slug }}
        </div>
    </div>

    <x-input.text wire:model="embedUrl" placeholder="Enter a URL to embed" />

    <x-input.select wire:model="type">
        @foreach (App\Models\PostType::cases() as $case)
            <option value="{{ $case->value }}" @selected($case === $post->type)>{{ $case->value }}</option>
        @endforeach
    </x-input.select>

    <x-input.markdown wire:model="content" :value="json_encode($content)" />

    <div class="w-full p-2 border-4 bg-white rounded-lg">
        <x-card-grid>
            @if ($post)
                @foreach ($post->getMedia() as $media)
                    <div wire:key="media-{{ $media->getKey() }}">
                        {{ $media }}
                        <x-button onclick="navigator.clipboard.writeText('![]({{ $media->getFullUrl() }})')">Copy</x-button>
                        <x-button wire:click="delete({{ $media->getKey() }})">Delete</x-button>
                    </div>
                @endforeach
            @endif
        </x-card-grid>
    </div>

    <input id="choose-files" type="file" wire:model="files" class="hidden" multiple />
    <x-button onclick="document.getElementById('choose-files').click()" type="button">Add Media</x-button>
    <x-button type="submit">{{ $post ? 'Update Post' : 'Create Post' }}</x-button>
</form>
