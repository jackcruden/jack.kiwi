@props(['title', 'action' => null])

<x-layout title="{{ $title }}">
    <x-slot:head>
        {{ $head ?? '' }}
    </x-slot:head>

    <div class="container mx-auto">
        <div class="flex justify-between mb-4">
            <div class="text-3xl pt-1 font-extrabold">
                {{ $title }}
            </div>

            <div>
                {{ $action }}
            </div>
        </div>

        <div {{ $attributes->only('class') }}>
            {{ $slot }}
        </div>
    </div>
</x-layout>
