<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cerita extends Model
{
    use HasFactory;
    protected $table = 'cerita';

    protected $fillable = [
        'id',
        'judul_cerita',
        'content',
        'image_header_url',
        'author',
        'kategori'
    ];
}
