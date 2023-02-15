<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Concert>
 */
class ConcertFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(7),
            'date_start' => $this->faker->dateTime(),
            'date_end' => $this->faker->dateTime(),
            'num_max_persons' => $this->faker->numberBetween(1000, 5000),
            'num_tickets_sold' => $this->faker->numberBetween(1000, 5000)
        ];
    }
}
