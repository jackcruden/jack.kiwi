@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <h1>Projects</h1>

    <div class="flex flex-wrap -m-2">
        @foreach(App\Project::published()->get() as $project)
            <div class="w-full sm:w-1/2 md:w-1/3">
                @component('project', compact('project'))
                @endcomponent
            </div>
        @endforeach
    </div>
@endsection
