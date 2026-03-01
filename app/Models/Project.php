<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = [
        'title', 'slug', 'description', 'long_description',
        'thumbnail', 'github_url', 'live_url',
        'tags', 'category', 'emoji', 'featured', 'order',
    ];

    protected $casts = [
        'tags'     => 'array',
        'featured' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($project) {
            $project->slug = Str::slug($project->title);
        });
    }
}