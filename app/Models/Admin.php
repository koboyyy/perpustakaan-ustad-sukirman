<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    /** @use HasFactory<\Database\Factories\AdminFactory> */
    use HasFactory;

    protected $table = 'tbl_admin';

    protected $guarded = ['id'];

    // relasi dengan tabel peminjaman dan pengembalian
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'id_admin');
    }

    public function pengembalian()
    {
        return $this->hasMany(Pengembalian::class, 'id_admin');
    }
}
