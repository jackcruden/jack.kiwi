@props(['title', 'action' => null])

<x-layout title="{{ $title }}">
    <x-slot:head>
        {{ $head ?? '' }}
    </x-slot:head>

    <div class="container mx-auto">
        <div class="flex justify-between">
            <div class="text-3xl font-extrabold">
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
