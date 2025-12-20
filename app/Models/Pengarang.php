<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengarang extends Model
{
    use HasFactory;
    protected $table = 'tbl_pengarang';

    protected $guarded = ['id'];

    public function detail_pengarang()
    {
        return $this->hasMany(Pengarang::class, 'id_pengarang');
    }
}
