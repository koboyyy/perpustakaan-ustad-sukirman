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

    // fk id_peminjaman
    public function detail_peminjaman()
    {
        return $this->hasMany(DetailPeminjaman::class, 'id_peminjaman');
    }

    // terhubung ke table anggota dengan fk id_anggota
    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'id_anggota');
    }

    // terhubung ke table admin dengan fk id_admin
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin');
    }
}

