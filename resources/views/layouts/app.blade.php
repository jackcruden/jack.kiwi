<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>jack.kiwi</title>
    <meta name="description" content="Jack Cruden's portfolio website.">

    <!-- Scripts -->
    <script src="{{ mix('/js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="flex border-b">
            <div class="p-2 flex-1">
                <div class="mb-1">jack.kiwi</div>
                <div class="text-xs text-grey-darker">Jack Cruden's portfolio website.</div>
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
                        <a href="/blog" class="@active('blog/*')">
                            Blog
                        </a>
                    </li>
                    <li>
                        <a href="/me" class="@active('me')">
                            Me
                        </a>
                    </li>
                    <li class="w-full items-center pl-4 pr-2">
                        <div class="relative">
                            <ais-index
                                app-id="ZX7KWEFAEQ"
                                api-key="0485e1f4466829a42b7c31ee225e7e16"
                                index-name="posts"
                                :auto-search="false"
                            >
                                <ais-input placeholder="Search&hellip;" class="p-2 border rounded-lg text-sm"></ais-input>

                                <ais-results inline-template>
                                    <div v-show="searchStore.query.length > 0" class="absolute mt-1 pin-r bg-white rounded-lg border" style="width: 300px;">
                                        <ul class="list-reset p-2">
                                            <li v-for="result in results" class="p-2 border-b">
                                                <a :href="'/blog/' + result.slug">
                                                    <ais-highlight :result="result" attribute-name="title"></ais-highlight>
                                                </a>
                                            </li>
                                            <li class="pt-2 pr-2 text-right">
                                                <a href="https://algolia.com" target="_blank">
                                                    <img src="/images/algolia.svg" class="h-4">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </ais-results>
                                <ais-no-results>
                                    <div class="absolute mt-1 pin-r bg-white rounded-lg border" style="width: 300px;">
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
