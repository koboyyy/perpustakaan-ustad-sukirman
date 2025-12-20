<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengarang extends Model
{
    protected $table = 'tbl_pengarang';

    protected $guarded = ['id'];

    public function detail_pengarang()
    {
        return $this->hasMany(Pengarang::class, 'id_pengarang');
    }
}
