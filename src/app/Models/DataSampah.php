<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSampah extends Model
{
    use HasFactory;

    protected $table = 'data_sampah';

    protected $fillable = [
        'tipe_sampah',
        'amount',
        'unit_pelapor'
    ];
}
