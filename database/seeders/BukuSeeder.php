<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\Pengarang;
use App\Models\Penerbit;
use App\Models\Kategori;
use App\Models\Rak;
use App\Models\DetailPengarang;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seeder untuk tabel penerbit
        Penerbit::factory()->count(100)->create();

        // Seeder untuk tabel kategori
        Kategori::factory()->count(100)->create();

        // Seeder untuk tabel rak
        Rak::factory()->count(100)->create();

        // Seeder untuk tabel pengarang
        Pengarang::factory()->count(100)->create();

        // Seeder untuk tabel buku
        Buku::factory()->count(1000)->create();

        // Seeder untuk tabel detail_pengarang
        DetailPengarang::factory()->count(100)->create();
    }
}
