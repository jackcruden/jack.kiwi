<form wire:submit.prevent="submit" class="space-y-2">
    <div>
        <x-input.text wire:model="title" placeholder="Enter a title" />
        <div class="font-mono text-sm">
            {{ route('home').'/posts/'.$this->slug }}
        </div>
    </div>

    <x-input.text wire:model="embedUrl" placeholder="Enter a URL to embed" />

    <x-input.markdown wire:model="content" :value="json_encode($content)" />

    @if ($post)
        <x-button type="submit">Update Post</x-button>
    @else
        <x-button type="submit">Create Post</x-button>
    @endif
</form>
