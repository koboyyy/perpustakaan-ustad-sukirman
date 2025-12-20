<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'tbl_kategori';

    protected $guarded = ['id'];

    public function buku()
    {
        return $this->hasMany(Buku::class, 'id_kategori');
    }
}
