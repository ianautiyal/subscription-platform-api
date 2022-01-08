<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Subscriber;
use App\Models\Website;
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
        Website::factory()
            ->count(100)
            ->has(Post::factory()->count(50), 'posts')
            ->create();

        Subscriber::factory()
            ->count(500)
            ->create();
    }
}
