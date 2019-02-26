<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-134924908-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-134924908-1');
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('feed::links')
    <title>@yield('title', 'Jack Cruden') - jack.kiwi</title>
    <meta name="description" content="Jack Cruden's portfolio & blog">
    <link rel="icon" href="/images/kiwifruit.png">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">

    @yield('head')
</head>
<body>
    <div id="app">
        <div class="sm:flex border-b" style="background-color: #fffdf4;">
            <a href="/" class="flex flex-1 items-center mt-2 sm:mt-0 text-grey-darkest hover:text-grey-darkest">
                <div class="pl-3 whitespace-no-wrap">
                    <div class="mb-1">
                        <img src="/images/kiwifruit.svg" class="w-4 align-middle" alt="Kiwifruit">
                        <strong>jack.kiwi</strong>
                    </div>
                    <div class="text-xs text-grey-darker">Jack Cruden's portfolio & blog</div>
                </div>
            </a>

            <nav class="flex-1 text-right w-full justify-end items-center overflow-y-visible">
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
                        <a href="/blog" class="@active('blog*')">
                            Blog
                        </a>
                    </li>
                    <li>
                        <a href="/me" class="@active('me')">
                            Me
                        </a>
                    </li>
                    <li class="w-auto pl-4 pr-4">
                        <div class="w-full">
                            <ais-index
                                app-id="ZX7KWEFAEQ"
                                api-key="0485e1f4466829a42b7c31ee225e7e16"
                                index-name="posts"
                                :auto-search="false"
                            >
                                <ais-input placeholder="Search&hellip;" class="w-full p-2 border rounded-lg text-sm"></ais-input>

                                <ais-results inline-template>
                                    <div v-show="searchStore.query.length > 0" class="absolute w-auto mt-1 pin-r bg-white rounded-lg border mr-3" style="max-width: 300px;">
                                        <ul class="list-reset p-2">
                                            <li v-for="result in results" class="p-2 border-b text-left">
                                                <a :href="'/blog/' + result.slug">
                                                    <ais-highlight :result="result" attribute-name="title"></ais-highlight>
                                                </a>
                                            </li>
                                            <li class="pt-2 pr-2 text-right">
                                                <a href="https://algolia.com" target="_blank" rel="noopener">
                                                    <img src="/images/algolia.svg" class="h-4">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </ais-results>
                                <ais-no-results>
                                    <div class="absolute mt-1 pin-r mr-3 bg-white rounded-lg border w-auto" style="max-width: 300px;">
                                        <ul class="list-reset p-2">
                                            <li class="p-2 border-b">
                                                No posts found.
                                            </li>
                                            <li class="pt-2 pr-2 text-right">
                                                <a href="https://algolia.com" target="_blank">
                                                    <img src="/images/algolia.svg" class="h-4">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </ais-no-results>
                             </ais-index>
                        </div>
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

        @yield('app')

        @if (trim($__env->yieldContent('content')))
            <div class="mx-auto px-3 max-w-xl my-6 lg:my-12">
                @yield('content')
            </div>
        @endif
    </div>

    <script src="{{ mix('/js/app.js') }}" defer></script>

    @yield('footer')
</body>
</html>
