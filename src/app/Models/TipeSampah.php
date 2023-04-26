<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeSampah extends Model
{
    use HasFactory;
    protected $table = 'tipe_sampah';

    protected $fillable = [
        'nama_sampah',
        'deskripsi_tipe'
    ];
}
