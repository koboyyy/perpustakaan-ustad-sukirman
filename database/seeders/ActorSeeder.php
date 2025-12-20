<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Anggota;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::factory(10)->create();
        Anggota::factory(100)->create();
    }
}
