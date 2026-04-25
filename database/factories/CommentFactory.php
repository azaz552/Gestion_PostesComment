<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Post;
use App\Models\Video;

class CommentFactory extends Factory
{
    public function definition(): array
    {
        $commentable = fake()->randomElement([
            Post::factory(),
            Video::factory()
        ]);

        return [
            'content' => fake()->sentence(),
            'user_id' => User::factory(),
            'commentable_id' => $commentable,
            'commentable_type' => get_class($commentable),
        ];
    }
}