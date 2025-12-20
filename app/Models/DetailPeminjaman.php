<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPeminjaman extends Model
{
    /** @use HasFactory<\Database\Factories\DetailPeminjamanFactory> */
    use HasFactory;

    protected $table = 'tbl_detail_peminjaman';

    protected $guarded = ['id'];

    // Relasi ke tabel buku dengan fk id_buku
    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku');
    }

    // Relasi ke tabel peminjaman dengan fk id_peminjaman
    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'id_peminajaman');
    }
}
