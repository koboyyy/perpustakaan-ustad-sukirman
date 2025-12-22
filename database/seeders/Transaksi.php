<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Transaksi extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Peminjaman::factory(10)->create();
        \App\Models\Pengembalian::factory(10)->create();
        \App\Models\DetailPeminjaman::factory(20)->create();
    }
}
