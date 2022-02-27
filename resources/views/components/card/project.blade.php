@props(['project'])

<x-card
    class="relative"
    style="
        background-image: url('{{ $project->cover_thumbnail_url }}');
        background-size: cover;
    ">
    <a
        href="/projects/{{ $project->slug }}"
        class="block overflow-hidden"
        style="
            min-height: 150px;
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
