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

    {{ $head ?? '' }}
</head>
<body>
    <div id="app">
        <div class="sm:flex border-b">
            <a href="/" class="flex items-center mt-2 sm:mt-0 text-grey-darkest hover:text-grey-darkest">
                <div class="pl-3 whitespace-no-wrap">
                    <div class="mb-1">
                        <img src="/images/kiwifruit.svg" class="w-4 align-middle" alt="Kiwifruit">
                        <strong>jack.kiwi</strong>
                    </div>
                    <div class="text-xs text-grey-darker">Jack Cruden's portfolio & blog</div>
                </div>
            </a>

            <nav class="flex-1 text-right justify-end items-center overflow-y-visible overflow-x-hidden">
                <ul class="x-navigation">
                    <li>
                        <a href="/" class="@active('/')">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="/projects" class="@active('projects*')">
                            Projects
                        </a>
                    </li>
                    <li>
                        <a href="/sketches" class="@active('sketches*')">
                            Sketches
                        </a>
                    </li>
                    <li>
                        <a href="/blog" class="@active('blog*')">
                            Blog
                        </a>
                    </li>
                    <li>
                        <a href="/me" class="@active('me')">
                            Me
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        @if (session('success'))
            <div class="mx-auto max-w-xl text-center">
                <div class="inline-block mx-auto mb-2 p-2 bg-green text-white text-center rounded-b-lg">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        @if ($errors->any())
            <div class="mx-auto max-w-xl text-center">
                <div class="inline-block mx-auto mb-2 p-2 bg-red text-white text-center rounded-b-lg">
                    <ul class="list-reset">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <div class="mx-auto px-3 max-w-xl my-6 lg:my-12">
            {{ $slot }}
        </div>
    </div>

    {{--    <script src="{{ mix('/js/app.js') }}" defer></script>--}}
</body>
</html>
