<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
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
            'price' => fake()->randomFloat(2, 1, 1000),
            'description' => fake()->sentence(),
            'status' => 'unknown',
        ];
    }

    public function available(): static
    {
        return $this->state(['status' => 'available']);
    }

    public function unavailable(): static
    {
        return $this->state(['status' => 'unavailable']);
    }
}
