<?php

namespace Database\Seeders;

use App\Models\Rak;
use App\Models\Buku;
use App\Models\Sumber;
use App\Models\Kategori;
use App\Models\Penerbit;
use App\Models\Pengarang;
use App\Models\DetailPengarang;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Penerbit::factory()->count(50)->create();
        // Seeder untuk tabel penerbit
        Kategori::create([
            'nama_kategori' => 'Sains'
        ]);

        Kategori::create([
            'nama_kategori' => 'Komedi'
        ]);

        Kategori::create([
            'nama_kategori' => 'Novel'
        ]);

        Kategori::create([
            'nama_kategori' => 'Hiburan'
        ]);

        // Seeder untuk tabel kategori
        // Kategori::factory()->count(20)->create();

        // Seeder untuk tabel rak
        Rak::factory()->count(10)->create();

        // Seeder untuk tabel pengarang
        Pengarang::factory()->count(10)->create();

        // Seeder untuk tabel buku
        Buku::factory()->count(10)->create();

        // Seeder untuk tabel sumber
        // Sumber::factory()->count(10)->create();

        Sumber::create([
            'nama_sumber' => 'Sumbangan'
        ]);

        Sumber::create([
            'nama_sumber' => 'Pembelian'
        ]);

        Sumber::create([
            'nama_sumber' => 'Hibah'
        ]);

        // Seeder untuk tabel detail_pengarang
        DetailPengarang::factory()->count(50)->create();
    }
}
