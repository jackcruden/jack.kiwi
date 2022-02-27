<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Jack Cruden',
            'email' => 'jackcruden@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        Tag::factory(10)->create();
        Post::factory(20)->blog()->create();
        Post::factory(20)->project()->create();
        Post::factory(20)->sketch()->create();

        Post::all()->each(function ($post) {
            $post->tags()->attach(Tag::all()->random(rand(2, 5)));
        });
    }
}
