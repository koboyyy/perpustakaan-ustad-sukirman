<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota
{
    private static $listAnggota = [
        [
            'no_anggota' => 'A001',
            'nama' => 'Ahmad Rizki',
            'email' => 'ahmad@email.com',
            'no_hp' => '081234567890',
            'status' => 'Aktif',
        ],
        [
            'no_anggota' => 'A002',
            'nama' => 'Siti Nurhaliza',
            'email' => 'siti@email.com',
            'no_hp' => '082345678901',
            'status' => 'Aktif',
        ],
        [
            'no_anggota' => 'A003',
            'nama' => 'Budi Santoso',
            'email' => 'budi@email.com',
            'no_hp' => '083456789012',
            'status' => 'Tidak Aktif',
        ],
        [
            'no_anggota' => 'A004',
            'nama' => 'Rina Kusuma',
            'email' => 'rina@email.com',
            'no_hp' => '084567890123',
            'status' => 'Aktif',
        ],
        [
            'no_anggota' => 'A005',
            'nama' => 'Dewi Lestari',
            'email' => 'dewi@email.com',
            'no_hp' => '085678901234',
            'status' => 'Aktif',
        ],
        [
            'no_anggota' => 'A006',
            'nama' => 'Andi Wijaya',
            'email' => 'andi@email.com',
            'no_hp' => '086789012345',
            'status' => 'Tidak Aktif',
        ],
        [
            'no_anggota' => 'A007',
            'nama' => 'Eka Putra',
            'email' => 'eka@email.com',
            'no_hp' => '087890123456',
            'status' => 'Aktif',
        ],
        [
            'no_anggota' => 'A008',
            'nama' => 'Mira Saputri',
            'email' => 'mira@email.com',
            'no_hp' => '088901234567',
            'status' => 'Aktif',
        ],
        [
            'no_anggota' => 'A009',
            'nama' => 'Dian Pratama',
            'email' => 'dian@email.com',
            'no_hp' => '089012345678',
            'status' => 'Tidak Aktif',
        ],
        [
            'no_anggota' => 'A010',
            'nama' => 'Hanafi Nur',
            'email' => 'hanafi@email.com',
            'no_hp' => '080123456789',
            'status' => 'Aktif',
        ],
    ];

    public static function all()
    {
        return self::$listAnggota;
    }
}
