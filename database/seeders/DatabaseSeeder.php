<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'is_admin' => true,
            'password' => bcrypt('admin12345')
        ]);

        \App\Models\User::factory()->create([
            'name' => 'User One',
            'username' => 'user_one',
            'email' => 'user_one@gmail.com',
            'password' => bcrypt('user_one12345')
        ]);

        \App\Models\User::factory()->create([
            'name' => 'User Two',
            'username' => 'user_two',
            'email' => 'user_two@gmail.com',
            'password' => bcrypt('user_two12345')
        ]);

        \App\Models\User::factory()->create([
            'name' => 'User Three',
            'username' => 'user_three',
            'email' => 'user_three@gmail.com',
            'password' => bcrypt('user_three12345')
        ]);

        \App\Models\Community::factory(50)->create();
        \App\Models\Post::factory(500)->create();
        \App\Models\Comment::factory(1000)->create();
    }
}
