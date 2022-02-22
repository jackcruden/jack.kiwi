<?php

use App\Models\Post;

it('can render a project', function () {
    $project = Post::factory()->project()->create();

    $this->get(route('projects.show', $project))
        ->assertOk()
        ->assertSee($project->title)
        ->assertSee($project->content);
});
