@props(['heading'])

<div class="my-4">
    <h1 class="text-3xl font-extrabold mb-3">{{ $heading }}</h1>

    <div>
        {{ $slot }}
    </div>
</div>
