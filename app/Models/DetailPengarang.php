<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailPengarang extends Model
{
    use HasFactory;
    protected $table = 'tbl_detail_pengarang';

    protected $guarded = ['id'];

    public function pengarang()
    {
        return $this->belongsTo(Pengarang::class, 'tbl_pengarang');
    }
}
