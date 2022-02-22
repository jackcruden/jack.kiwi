<?php

use App\Models\Post;
use App\Models\Tag;

it('can render the home page', function () {
    $this->get('/')
        ->assertSee([
            'Jack',
            'Projects',
            'Sketches',
            'Blog',
        ]);
});

it('shows visible tags on the home page', function () {
    $tag = Tag::factory()->create();

    $this->get(route('home'))
        ->assertSee($tag->name);
});

it('does not show invisible tags on the home page', function () {
    $tag = Tag::factory()->invisible()->create();

    $this->get(route('home'))
        ->assertDontSee($tag->name);
});

it('can show a project on the home page', function () {
    $project = Post::factory()->project()->create();

    $this->get(route('home'))
        ->assertSee($project->title);
});

it('can show a blog post on the home page', function () {
    $post = Post::factory()->blog()->create();

    $this->get(route('home'))
        ->assertSee($post->title);
});
