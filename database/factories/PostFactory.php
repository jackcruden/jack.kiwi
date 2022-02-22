<?php

namespace Database\Factories;

use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'embed_url' => null,
            'image' => null,
            'content' => $this->faker->paragraph,
            'is_original' => true,
            'published_at' => Carbon::now()->subMinute(),
        ];
    }

    public function blog()
    {
        return $this->has(Tag::factory([
            'name' => 'Blog',
            'slug' => 'blog',
        ]));
    }

    public function project()
    {
        return $this->has(Tag::factory([
            'name' => 'Project',
            'slug' => 'project',
        ]));
    }
}
