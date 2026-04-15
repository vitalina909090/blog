<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class Tag extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'posts_count',
    ];

    public function casts(): array
    {
        return [
            'posts_count' => 'integer',
        ];
    }

    public function scopePopular(Builder $query) {
        return $query->where('posts_count', '>', 10);
    }
}