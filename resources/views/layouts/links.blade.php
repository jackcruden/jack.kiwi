@extends('layouts.app')

@section('app')
    <div class="w-full mx-4 md:w-2/3 md:mx-auto my-4">
        <div class="mb-4">
            <h1>Links</h1>
        </div>

        <div>
            @yield('links')
        </div>
    </div>
@endsection
