<?php

namespace Database\Seeders;

use App\Models\Post;
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

        Post::factory(100)->blog()->create();
        Post::factory(100)->project()->create();
        Post::factory(100)->sketch()->create();
    }
}
