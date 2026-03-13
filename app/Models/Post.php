<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'author_id',
        'is_published'
    ];

    protected $casts = [
        'is_published' => 'boolean'     // 0/1 -> false/true;
    ];
}
