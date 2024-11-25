<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->realText(50),
            'description' => $this->faker->unique()->realText(300),
            'location' => $this->faker->unique()->address,
            'start_date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'banner_image' => $this->faker->unique()->imageUrl(),
            'price' => $this->faker->numberBetween(10000,200000)
        ];
    }
}
