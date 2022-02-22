<?php

use App\Models\Post;

return [
    'feeds' => [
        'blog' => [
            'items' => [Post::class, 'getAllFeedItems'],
            'url'   => '/feed',
            'title' => 'jack.kiwi - Blog',
            'view'  => 'feed::feed',
            'format' => 'atom',
        ],
    ],
];
