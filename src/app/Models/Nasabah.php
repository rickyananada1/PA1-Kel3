<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    use HasFactory;

    protected $table = 'nasabah';

    protected $fillable = [
        'nama_nasabah',
        'no_rekening',
        'alamat_nasabah',
        'nik_nasabah',
        'nasabah_of',
        'user_id'
    ];
}
