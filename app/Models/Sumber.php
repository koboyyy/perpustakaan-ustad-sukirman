<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sumber extends Model
{
    protected $table = 'tbl_sumber';

    protected $guarded = ['id'];

    public function buku()
    {
        return $this->hasMany(Buku::class, 'id_sumber');
    }
}
