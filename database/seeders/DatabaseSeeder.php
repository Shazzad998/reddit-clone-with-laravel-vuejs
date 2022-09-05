<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comment;
use App\Models\Community;
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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'is_admin' => true,
            'password' => bcrypt('admin12345')
        ]);

        User::factory()->create([
            'name' => 'User One',
            'username' => 'user_one',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::factory()->create([
            'name' => 'User Two',
            'username' => 'user_two',
            'email' => 'user2@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::factory()->create([
            'name' => 'User Three',
            'username' => 'user_three',
            'email' => 'user3@gmail.com',
            'password' => bcrypt('password')
        ]);

        Community::factory(50)->has(Post::factory(50)->has(Comment::factory(5)))->create();;
    }
}
