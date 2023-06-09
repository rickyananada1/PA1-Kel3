<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homepage extends Model
{
    use HasFactory;

    protected $table = 'homepage_config';

    protected $fillable = [
        'key',
        'valuable'
    ];
}
