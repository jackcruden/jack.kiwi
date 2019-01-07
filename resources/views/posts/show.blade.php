@extends('layouts.app')

@section('app')
    <div class="mt-6 mx-3 md:w-3/4 lg:w-2/3 md:mx-auto">
        <div class="mb-4">
            <h1>{{ $post->title }}</h1>
        </div>

        <div class="x-post">
            {!! $post->rendered !!}
        </div>
    </div>
@endsection
