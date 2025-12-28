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
        Anggota::create([
            'nik' => '1234567891234567',
            'nama_lengkap' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'no_hp' => '1234567888',
            'alamat' => 'jl. Hr Soebrantas',
            'jenis_kelamin' => 'Laki-laki',
            'tanggal_lahir' => '2006-01-19'
        ]);

        Anggota::create([
            'nik' => '1234567891011121',
            'nama_lengkap' => 'Siapa',
            'username' => 'tenxi',
            'email' => 'tenxi@gmail.com',
            'password' => bcrypt('password'),
            'no_hp' => '1234567810',
            'alamat' => 'jl. Hr Soebrantas',
            'jenis_kelamin' => 'Laki-laki',
            'tanggal_lahir' => '2006-01-19'
        ]);

        // Admin::factory(10)->create();
        // Anggota::factory(10)->create();
    }
}
