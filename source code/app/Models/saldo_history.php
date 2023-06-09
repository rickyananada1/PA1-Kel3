<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class saldo_history extends Model
{
    use HasFactory;
    protected $table = 'saldo_histories';
    protected $fillable = [
        'saldo_id',
        'method',
        'jumlah_transaksi'
    ];
}
