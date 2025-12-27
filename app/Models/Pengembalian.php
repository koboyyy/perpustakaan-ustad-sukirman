<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    /** @use HasFactory<\Database\Factories\PengembalianFactory> */
    use HasFactory;

    protected $table = 'tbl_pengembalian';

    protected $guarded = ['id'];

    /**
     * Relasi ke model Peminjaman.
     * Setiap pengembalian pasti terkait satu peminjaman.
     */
    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'id_peminjaman');
    }
}
