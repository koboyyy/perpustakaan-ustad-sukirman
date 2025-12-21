<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=DetailPengarang>
 */
class DetailPengarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_pengarang' => $this->faker->numberBetween(1, 10),
            'id_buku' => $this->faker->numberBetween(1, 50),
        ];
    }
}
