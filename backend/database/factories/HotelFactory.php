<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hotel>
 */
class HotelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Отель "' . $this->faker->word() . '"',
            'city' => $this->faker->city(),
            'description' => $this->faker->realText(),
            'website' => $this->faker->url(),
        ];
    }
}
