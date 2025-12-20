<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPengarang extends Model
{
    protected $table = 'tbl_detail_pengarang';

    protected $guarded = ['id'];

    public function pengarang()
    {
        return $this->belongsTo(Pengarang::class, 'tbl_pengarang');
    }
}
