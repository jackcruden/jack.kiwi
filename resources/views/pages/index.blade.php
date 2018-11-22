@extends('layouts.app')

@section('app')
    <div class="flex flex-wrap lg:h-screen">
        <div class="w-full lg:max-w-sm self-center p-4">
            <div class="mb-2 text-3xl">
                <h1>I'm Jack.</h1>
            </div>

            <div class="mb-2 text-3xl">
                <p>I make stuff.</p>
            </div>

            <div class="text-xl">
                <ul class="list-reset x-list-label font-mono">
                    <li>php</li>
                    <li>javascript</li>
                    <li>html</li>
                    <li>css</li>
                    <li>databases</li>
                    <li>mysql</li>
                    <li>sqlite</li>
                    <li>laravel</li>
                    <li>vuejs</li>
                    <li>raspberry pi</li>
                    <li>linux</li>
                    <li>bash</li>
                    <li>design</li>
                </ul>
            </div>
        </div>

        <div class="flex-1 h-screen overflow-y-scroll">
            <a href="/snippin" class="x-project">
                <h3>Snippin</h3>
                <p>A paste bin but more casual.</p>
                <img src="https://placekitten.com/500/200">
            </a>
            <a href="/links" class="x-project">
                <h3>Link Shortener</h3>
                <p>This a whole different thing.</p>
                <img src="https://placekitten.com/500/200">
            </a>
            <a href="#" class="x-project">
                <h3>Leader Tools</h3>
                <p>This a whole different thing.</p>
                <img src="https://placekitten.com/500/200">
            </a>
            <a href="#" class="x-project">
                <h3>WeRoster</h3>
                <p>WeRoster is a whole thing.</p>
                <img src="https://placekitten.com/500/200">
            </a>
        </div>
    </div>
@endsection
