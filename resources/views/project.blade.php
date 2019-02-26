<a href="/projects/{{ $project->slug }}" class="x-item">
    <div class="p-3">
        <span class="font-medium">{{ $project->title }}</span><br>
        <small class="text-grey-dark">{{ $project->published_at_human }}</small>
    </div>

    @if ($project->image)
        <div class="x-item-image" style="background-image: url('/storage/{{ $project->image }}');"></div>
    @endif
</a>
