@extends('layouts.app')

@section('app')
    <div class="w-3/4 mx-auto m-6">
        <div class="mb-4">
            <h1>Projects</h1>
        </div>

        <div class="flex flex-wrap -m-2">
            @foreach(App\Project::all() as $project)
                <div class="w-1/3">
                    <a href="/projects/{{ $project->slug }}" class="x-project">
                        <span>{{ $project->title }}</span><br>
                        <small class="text-grey-dark">{{ $project->published_at_human }}</small>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
