<?php

namespace Database\Factories;

use App\Models\Ratings;
use App\Models\goods;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ratings>
 */
class RatingsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rate' => fake()->numberBetween(1,10),
            'goods_id' => fake()->numberBetween(1,10)
        ];
    }
}
