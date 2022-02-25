<?php

namespace Database\Factories;

use App\Models\PostType;
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
        $title = $this->faker->sentence(rand(3, 10));

        return [
            'type' => PostType::Blog,
            'title' => $title,
            'slug' => str($title)->slug(),
            'embed_url' => 'https://unsplash.it/1000/500?random',
            'content' => $this->faker->paragraph,
            'published_at' => now()->subMinute(),
        ];
    }

    public function blog()
    {
        return $this->state(function () {
            return [
                'type' => PostType::Blog,
            ];
        });
    }

    public function project()
    {
        return $this->state(function () {
            $title = $this->faker->sentence(rand(1, 2));

            return [
                'type' => PostType::Project,
                'title' => $title,
                'slug' => str($title)->slug(),
            ];
        });
    }

    public function sketch()
    {
        return $this->state(function () {
            $title = $this->faker->sentence(rand(1, 2));

            return [
                'type' => PostType::Sketch,
                'title' => $title,
                'slug' => str($title)->slug(),
            ];
        });
    }
}
