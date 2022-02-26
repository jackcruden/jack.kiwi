<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('feed::links')
    <title>@yield('title', 'Jack Cruden') - jack.kiwi</title>
    <meta name="description" content="Jack Cruden's portfolio & blog">
    <link rel="icon" href="/images/kiwifruit.png">

    <!-- Webmentions -->
    <link href="https://github.com/jackcruden" rel="me">
    <link rel="webmention" href="https://webmention.io/jack.kiwi/webmention" />
    <link rel="pingback" href="https://webmention.io/jack.kiwi/xmlrpc" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">

    <!-- SimpleMDE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">

    {{ $head ?? '' }}

    @livewireStyles
</head>
<body>
    @auth
        <div class="py-4 bg-green-500 font-medium text-white text-center">
            You are logged in as {{ auth()->user()->name }}.
            <form action="{{ route('logout') }}" method="post" class="inline">
                @csrf
                <button type="submit" class="">
                    Logout
                </button>
            </form>
        </div>
    @endauth

    <div>
        <div class="sm:flex items-center align-middle px-6 border-b">
            <a href="{{ route('home') }}" class="text-center sm:text-left">
                <div class="flex space-x-2 text-center place-content-center sm:place-content-start">
                    <img src="/images/kiwifruit.svg" class="w-6 align-middle" alt="Kiwifruit">
                    <div class="text-xl font-black">jack.kiwi</div>
                </div>
                <div class="text-sm">Jack Cruden's portfolio & blog</div>
            </a>

            <nav class="flex-1 text-center sm:text-right justify-end items-center overflow-y-visible overflow-x-hidden">
                <ul class="list-reset block justify-end items-center overflow-x-auto overflow-y-visible whitespace-no-wrap">
                    <x-menu.item label="Home" :url="route('home')" :active="request()->is('/')" />
                    <x-menu.item label="Projects" :url="route('projects.index')" :active="request()->is('projects*')" />
                    <x-menu.item label="Sketches" :url="route('sketches.index')" :active="request()->is('sketches*')" />
                    <x-menu.item label="Blog" :url="route('blog.index')" :active="request()->is('blog*')" />
                    <x-menu.item label="Me" :url="route('home')" :active="request()->is('me*')" />
                </ul>
            </nav>
        </div>

        @if (session('success'))
            <div class="mx-auto max-w-xl text-center">
                <div class="inline-block mx-auto mb-2 p-2 bg-green-500 text-white text-center rounded-b-lg">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        @if ($errors->any())
            <div class="mx-auto max-w-xl text-center">
                <div class="inline-block mx-auto p-2 bg-red-500 text-white text-center rounded-b-lg">
                    <ul class="list-reset">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <div class="mx-auto px-3 my-6 lg:my-12">
            {{ $slot }}
        </div>
    </div>

    @livewireScripts
    <!-- SimpleMDE -->
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>

    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
