<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'tbl_buku';

    protected $guarded = ['id'];

    /**
     * Relasi Buku ke Penerbit.
     * 
     * Menggunakan belongsTo karena pada tabel 'tbl_buku' terdapat foreign key 'id_penerbit'
     * yang merujuk ke tabel 'penerbit'. Dengan kata lain, setiap buku 'dimiliki oleh' satu penerbit,
     * sehingga relasi di sisi Buku adalah belongsTo.
     * 
     * Jika menggunakan hasOne, relasinya terbalik: itu mendefinisikan bahwa suatu model memiliki satu model lain yang foreign key-nya ada di model tersebut, 
     * bukan menghuni foreign key-nya. Pada kasus ini, 'tbl_buku' yang memiliki foreign key 'id_penerbit'.
     */
    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class, 'id_penerbit');
    }

    public function rak()
    {
        return $this->belongsTo(Rak::class, 'id_rak');
    }
    public function sumber()
    {
        return $this->belongsTo(Sumber::class, 'id_sumber');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    // foreign key id_buku yang ada di tabel peminjaman dan detail pengarang dapat di gunakan untuk menghubungkan id buku dengan detail peminajam
    public function detail_peminjaman()
    {
        return $this->hasMany(DetailPeminjaman::class, 'id_buku');
    }

    public function detail_pengarang()
    {
        return $this->hasMany(DetailPengarang::class, 'id_buku');
    }
}


