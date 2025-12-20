<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Buku>
 */
class BukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul_buku' => $this->faker->sentence(3),
            'id_penerbit' => $this->faker->numberBetween(1, 100), // pastikan data dummy/nilai yang sesuai dengan data relasi yang sudah ada
            'id_rak' => $this->faker->numberBetween(1, 100),
            'id_sumber' => $this->faker->numberBetween(1, 100),
            'id_kategori' => $this->faker->numberBetween(1, 100),
            'eksemplar' => $this->faker->numberBetween(1, 100),
            'tanggal_terima' => $this->faker->date(),
            'sinopsis' => $this->faker->paragraph(5),
            'cover' => 'cover.jpg', // contoh default
        ];
    }
}
