<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penerbit extends Model
{
    use HasFactory;
    protected $table = 'tbl_penerbit';

    protected $guarded = ['id'];

    /**
     * Relasi Penerbit ke Buku.
     * 
     * Menggunakan hasMany karena satu penerbit dapat memiliki banyak buku.
     * Relasi ini mencari baris-baris di tbl_buku yang memiliki id_penerbit sesuai dengan id penerbit ini.
     */
    public function buku()
    {
        return $this->hasMany(Buku::class, 'id_penerbit');
    }
}
