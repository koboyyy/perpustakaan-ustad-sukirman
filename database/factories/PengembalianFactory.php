<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengembalian>
 */
class PengembalianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_admin' => $this->faker->numberBetween(1, 10), // sesuaikan range id_admin yang tersedia
            'id_peminjaman' => $this->faker->numberBetween(1, 50), // sesuaikan range id_peminjaman yang tersedia
            'tanggal_kembali' => $this->faker->date(),
            'denda' => $this->faker->numberBetween(0, 10000), // nilai denda 0-10.000
        ];
    }
}
