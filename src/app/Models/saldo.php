<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class saldo extends Model
{
    use HasFactory;
    protected $table = 'saldo';

    protected $fillable = [
        'nasabah_id',
        'saldo'
    ];
}
