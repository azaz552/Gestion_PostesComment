<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Video;
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::factory(5)->create();

        $posts = Post::factory(10)->create([
            'user_id' => $users->random()->id
        ]);

        $videos = Video::factory(10)->create([
            'user_id' => $users->random()->id
        ]);

        foreach ($posts as $post) {
            Comment::factory(3)->create([
                'user_id' => $users->random()->id,
                'commentable_id' => $post->id,
                'commentable_type' => Post::class,
            ]);
        }

        foreach ($videos as $video) {
            Comment::factory(3)->create([
                'user_id' => $users->random()->id,
                'commentable_id' => $video->id,
                'commentable_type' => Video::class,
            ]);
        }


    $this->call([
        UserSeeder::class,
    ]);

    }
}