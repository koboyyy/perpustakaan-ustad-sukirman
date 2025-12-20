<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sumber extends Model
{
    use HasFactory;
    protected $table = 'tbl_sumber';

    protected $guarded = ['id'];

    public function buku()
    {
        return $this->hasMany(Buku::class, 'id_sumber');
    }
}
