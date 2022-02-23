@extends('layouts.app')

@section('title', 'Links')

@section('content')
    <h1>Links</h1>

    <form method="post" action="/links" class="w-full flex">
        @csrf
        <div class="flex-1 mr-3">
            <x-input.text type="text" name="url" placeholder="https://..." />
        </div>
        <div class="flex-1 flex">
            <div class="flex-1 mr-3">
                <input type="text" name="name" placeholder="name (optional)" class="x-input w-full">
            </div>
            <button type="submit" class="x-button">Create</button>
        </div>
    </form>

    <div class="mt-4">
        @if(!count($links))
            No links.
        @else
            @foreach($links as $link)
                <div class="flex py-4 border-b">
                    <div class="flex-1 mr-3">
                        {{ $link->url }}
                    </div>
                    <div class="flex-1">
                        <a href="{{ config('app.url').'/'.$link->name }}">
                            {{ $link->name }}
                        </a>
                    </div>
                    <div onclick="copyToClipboard('{{ config('app.url').'/'.$link->name }}')">
                        <button>
                            Copy
                        </button>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
