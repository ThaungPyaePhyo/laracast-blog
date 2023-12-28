<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        Category::truncate();
        Post::truncate();
         $user = \App\Models\User::factory()->create([
             'name' => 'doe doe',
         ]);

         Post::factory(5)->create([
             'user_id' => $user->id
         ]);
    }
}
