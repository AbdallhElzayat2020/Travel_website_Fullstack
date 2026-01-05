<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class CruiseGroup extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'group_key',
        'sort_order',
        'status',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($group) {
            if (empty($group->slug)) {
                $group->slug = Str::slug($group->name);
            }
        });

        static::updating(function ($group) {
            if ($group->isDirty('name') && empty($group->slug)) {
                $group->slug = Str::slug($group->name);
            }
        });
    }

    /**
     * Scope a query to only include active groups.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Cruise experiences belonging to this group.
     */
    public function cruiseExperiences(): HasMany
    {
        return $this->hasMany(CruiseExperience::class)->orderBy('sort_order');
    }
}
