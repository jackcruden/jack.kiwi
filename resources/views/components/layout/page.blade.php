@props(['title' => null, 'action' => null])

<x-layout title="{{ $title }}">
    <x-slot:head>
        {{ $head ?? '' }}
    </x-slot:head>

    <div class="container mx-auto">
        @if ($title || $action)
            <div class="flex items-end justify-between mb-4">
                <div class="text-3xl pt-1 font-extrabold">
                    {{ $title }}
                </div>

                <div>
                    {{ $action }}
                </div>
            </div>
        @endif

        <div {{ $attributes->only('class') }}>
            {{ $slot }}
        </div>
    </div>
</x-layout>
