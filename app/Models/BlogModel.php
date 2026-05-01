<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogModel extends Model
{
    use HasFactory;

    protected $table = 'blog';

    protected $fillable = ['title', 'slug', 'upload_date', 'description', 'images', 'created_by'];

    protected $casts = [
        'images' => 'array', // 'images' sütununu avtomatik olaraq array-ə çevirir
    ];
}
