@props(['sketch'])

<x-card>
    <a href="{{ $sketch->link }}" class="overflow-hidden">
        <img class="block" src="/images/placeholder.jpg" alt="{{ $sketch->title }}">
    </a>
</x-card>
