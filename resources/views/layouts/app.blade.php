<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Jack.Kiwi</title>

    <!-- Scripts -->
    <script src="{{ mix('/js/app.js') }}" defer></script>

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="https://fonts.gstatic.com"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Montserrat:900" rel="stylesheet" type="text/css"> --}}

    <!-- Styles -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="flex p-2 border-b">
            <div class="flex-1">
                <div class="mb-1">jack.kiwi</div>
                <div class="text-grey-darker">Jack's website.</div>
            </div>

            <nav class="flex justify-end items-center">
                <ul class="x-navigation">
                    <li>
                        <a href="/" class="@active('/')">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="/projects" class="@active('projects')">
                            Projects
                        </a>
                    </li>
                    <li>
                        <a href="/blog" class="@active('blog')">
                            Blog
                        </a>
                    </li>
                    <li>
                        <a href="/me" class="@active('me')">
                            Me
                        </a>
                    </li>
                    <li class="pl-4">
                        <input type="text" placeholder="Search&hellip;" class="p-2 border rounded-lg text-sm">
                    </li>
                </ul>
            </nav>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('app')
    </div>
</body>
</html>
