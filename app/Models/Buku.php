<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    // use HasFactory;

    protected $table= 'table_buku';
    protected $guarded= [];

    protected $fillable = [
        'id','kategori_buku', 'judul_buku', 'jumlah_buku', 'tg_masuk', 'status'
    ];
}
