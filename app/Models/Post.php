<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'title', 'slug', 'excerpt', 'content',
        'cover_image', 'tags', 'reading_time',
        'published', 'published_at',
    ];

    protected $casts = [
        'tags'         => 'array',
        'published'    => 'boolean',
        'published_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($post) {
            $post->slug = Str::slug($post->title);
        });
    }

    // Scope pour les articles publiés uniquement
    public function scopePublished($query)
    {
        return $query->where('published', true)
                     ->orderBy('published_at', 'desc');
    }
}