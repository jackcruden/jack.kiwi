@extends('layouts.app')

@section('app')
    <div class="w-3/4 mx-auto m-6">
        <div class="mb-4">
            <h1>{{ $post->title }}</h1>
        </div>

        <div class="x-post">
            {!! $post->rendered !!}
        </div>
    </div>
@endsection
