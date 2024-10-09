<?php

namespace Database\Factories;

use App\Models\Career;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Data>
 */
class DataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'slug' => Str::slug(fake()->sentence()),
            'title' => fake()->sentence(10, false),
            'career_id' => Career::factory(),
            'number' => random_int(1,500),
            'desc' => fake()->text()
        ];
    }
}
