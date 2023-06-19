<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriCerita extends Model
{
    use HasFactory;
    protected $table = 'kategori_cerita';
    protected $fillable = [
        'nama_kategori',
        'unit_id'
    ];
}
