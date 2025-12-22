<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    /** @use HasFactory<\Database\Factories\AnggotaFactory> */
    use HasFactory;

    protected $table = 'tbl_anggota';

    protected $guarded = ['id'];

    // relasi dengan tabel peminjaman
    public function peminjaman()
    {
        return $this->hasOne(Peminjaman::class, 'id_anggota');
    }
}
