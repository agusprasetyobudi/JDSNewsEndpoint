<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $postStatus = ['publish','draft'];
        return [
            'name'=> $name = fake()->title(),
            'slug' => Str::slug($name),
            'is_post' => array_rand($postStatus),
            'post' => fake()->realText($maxNbChars = 200, $indexSize = 2),
        ];
    }
}
