<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table= 'table_kategori';

    protected $fillable = [
        'id',
        'kategori',
        'slug',
    ];

    public function kategori()
    {
        return $this->hasMany(Kategori::class);
    }
}
