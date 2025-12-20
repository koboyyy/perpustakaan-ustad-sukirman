<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Transaksi::create([
            "id_anggota" => 1,
            "id_buku" => 1,
            "tanggal_pinjam" => "2025-09-01",
            "tanggal_jatuh_tempo" => "2025-12-01",
        ]);
    }
}
