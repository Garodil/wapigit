<?php

namespace Database\Factories;

use App\Models\goods;
use App\Models\Ratings;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\goods>
 */
class goodsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        return [
            'name' => fake()->word(),
            'cost' => fake()->numberBetween(1,199),
            'producers_id' => fake()->numberBetween(1,4),
            'categories_id' => fake()->numberBetween(1,7),
        ];
    }
}
