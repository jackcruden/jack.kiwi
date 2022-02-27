@props(['project'])

<x-card class="relative">
    <img src="{{ $project->cover_thumbnail_url }}" class="w-full">

    <a
        href="/projects/{{ $project->slug }}"
        class="block absolute inset-0 overflow-hidden"
        style="
            background-image: linear-gradient(
                to bottom,
                rgba(0, 0, 0, 0.55) 30%,
                rgba(0, 0, 0, 0.0)
            );
        "
    >
        <div class="p-3 text-white">
            <span class="font-medium">{{ $project->title }}</span><br>
            <small class="text-grey-dark">{{ $project->published_at_human }}</small>
        </div>
    </a>
</x-card>
