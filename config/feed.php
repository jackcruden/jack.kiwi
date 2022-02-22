<?php

return [
    'feeds' => [
        'blog' => [
            'items' => App\Models\Post::class.'@getAllFeedItems',
            'url'   => '/feed',
            'title' => 'jack.kiwi - Blog',
            'view'  => 'feed::feed',
        ],
    ],
];
