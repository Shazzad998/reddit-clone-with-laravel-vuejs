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
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1,4),
            'community_id' => $this->faker->numberBetween(1,10),
            'title' => $this->faker->text,
            'url' => $this->faker->url,
            'description' => $this->faker->text

        ];
    }
}
