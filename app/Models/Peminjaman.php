<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    /** @use HasFactory<\Database\Factories\PeminjamanFactory> */
    use HasFactory;

    protected $table = 'tbl_peminjaman';

    protected $guarded = ['id'];

    // Relasi ke detail peminjaman (fk id_peminjaman)
    public function detail_peminjaman()
    {
        return $this->hasMany(DetailPeminjaman::class, 'id_peminjaman');
    }

    // Relasi ke anggota (fk id_anggota)
    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'id_anggota');
    }

    // Relasi satu peminjaman dimiliki oleh tabel pengembalian (satu-satu)
    public function pengembalian()
    {
        return $this->hasOne(Pengembalian::class, 'id_peminjaman');
    }
}
