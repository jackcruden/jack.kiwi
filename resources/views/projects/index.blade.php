@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <h1>Projects</h1>

    <div class="flex flex-wrap -m-2">
        @foreach(App\Project::published()->get() as $project)
            <div class="w-1/3">
                <a href="/projects/{{ $project->slug }}" class="x-project">
                    <span class="font-medium">{{ $project->title }}</span><br>
                    <small class="text-grey-dark">{{ $project->published_at_human }}</small>
                </a>
            </div>
        @endforeach
    </div>
@endsection
