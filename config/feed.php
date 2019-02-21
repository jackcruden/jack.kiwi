<?php

return [
    'feeds' => [
        'blog' => [
            'items' => 'App\Post@getAllFeedItems',
            'url'   => '/feed/blog',
            'title' => 'jack.kiwi - Blog',
            'view'  => 'feed::feed',
        ],
        'projects' => [
            'items' => 'App\Project@getAllFeedItems',
            'url'   => '/feed/projects',
            'title' => 'jack.kiwi - Projects',
            'view'  => 'feed::feed',
        ],
    ],
];
