<?php

return [
    'feeds' => [
        'blog' => [
            'items' => App\Post::class.'@getAllFeedItems',
            'url'   => '/feed/blog',
            'title' => 'jack.kiwi - Blog',
            'view'  => 'feed::feed',
        ],
        'projects' => [
            'items' => App\Project::class.'@getAllFeedItems',
            'url'   => '/feed/projects',
            'title' => 'jack.kiwi - Projects',
            'view'  => 'feed::feed',
        ],
    ],
];
