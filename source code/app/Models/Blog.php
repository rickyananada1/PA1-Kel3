<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blog';

    protected $fillable = [
        'id',
        'judul_blog',
        'content',
        'image_header_url',
        'author',
        'kategori'
    ];
}
