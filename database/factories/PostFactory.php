<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        $types = [
            'image',
            'video',
            'reels',
        ];

        return [
            'base_url' => 'http://127.0.0.1:8000/',
            'file_name' => fake()->text(32),
            'type' => $types[rand(0,2)],
            'latitude' => fake()->latitude(),
            'longitude' => fake()->longitude(),
            'caption' => fake()->text(rand(30, 500)),
            'view' => rand(0,10000),
            'likes_count' => rand(0, 100000),
            'comments_count' => rand(0, 100000),
            'shares_count' => rand(0, 100000),
            'saves_count' => rand(0, 100000),
            'user_id' => 10000,
        ];
    }
}
