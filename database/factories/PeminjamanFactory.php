<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Peminjaman>
 */
class PeminjamanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_anggota' => $this->faker->numberBetween(1, 10), // sesuaikan range id_anggota yang tersedia
            'id_admin' => $this->faker->numberBetween(1, 10), // sesuaikan range id_admin yang tersedia
            'tanggal_pinjam' => $this->faker->date(),
            'status' => $this->faker->randomElement(['dipinjam', 'dikembalikan']),
        ];
    }
}
