<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class CruiseExperience extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'status',
        'sort_order',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($experience) {
            if (empty($experience->slug)) {
                $experience->slug = Str::slug($experience->title);
            }
        });

        static::updating(function ($experience) {
            if ($experience->isDirty('title') && empty($experience->slug)) {
                $experience->slug = Str::slug($experience->title);
            }
        });
    }

    /**
     * Scope a query to only include active experiences.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Images gallery for this experience.
     */
    public function images(): HasMany
    {
        return $this->hasMany(CruiseExperienceImage::class)->orderBy('sort_order');
    }

    /**
     * Related tours for this experience.
     */
    public function tours(): BelongsToMany
    {
        return $this->belongsToMany(Tour::class, 'cruise_experience_tour')->withTimestamps();
    }
}
