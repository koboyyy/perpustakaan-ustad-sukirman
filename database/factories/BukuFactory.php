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
            'id_penerbit' => $this->faker->numberBetween(1, 20), // pastikan data dummy/nilai yang sesuai dengan data relasi yang sudah ada
            'id_rak' => $this->faker->numberBetween(1, 7),
            'id_sumber' => $this->faker->numberBetween(1, 10),
            'id_kategori' => $this->faker->numberBetween(1, 20),
            'tahun_terbit' => $this->faker->year(),
            'eksemplar' => $this->faker->numberBetween(1, 20),
            'tanggal_terima' => $this->faker->date(),
            'sinopsis' => $this->faker->paragraph(5),
            'cover' => $this->faker->image('storage/app/public/buku', 400, 600, null, false), // generate gambar acak di storage/buku, hanya simpan nama file
        ];
    }
}
