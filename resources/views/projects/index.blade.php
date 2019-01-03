@extends('layouts.app')

@section('app')
    <div class="w-3/4 mx-auto m-6">
        <div class="mb-4">
            <h1>Projects</h1>
        </div>

        <div>
            @foreach(App\Project::all() as $project)

                {{ $project->title }}
            @endforeach
        </div>
    </div>
@endsection
