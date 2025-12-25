<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Anggota extends Authenticatable
{
    use HasFactory;

    protected $table = 'tbl_anggota';

    protected $guarded = ['id'];

    /**
     * Kolom yang disembunyikan (keamanan)
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Relasi dengan tabel peminjaman
     */
    public function peminjaman()
    {
        return $this->hasOne(Peminjaman::class, 'id_anggota');
    }
}
