<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    protected $table = 'tbl_rak';

    protected $guarded = ['id'];

    public function buku()
    {
        return $this->hasMany(Buku::class, 'id_rak');
    }
}
