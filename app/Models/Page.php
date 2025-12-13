<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'slug',
        'name',
        'meta_title',
        'meta_description',
        'meta_author',
        'meta_keywords',
    ];

    /**
     * Get page by slug
     */
    public static function getBySlug(string $slug)
    {
        return static::where('slug', $slug)->first();
    }
}
