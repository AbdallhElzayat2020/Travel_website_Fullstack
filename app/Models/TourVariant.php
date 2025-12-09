<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourVariant extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'tour_id',
        'title',
        'description',
        'additional_duration',
        'additional_duration_type',
        'additional_price',
        'status',
        'sort_order',
    ];

    protected $casts = [
        'additional_duration' => 'integer',
        'additional_price' => 'decimal:2',
        'sort_order' => 'integer',
    ];

    /**
     * Get the tour that owns the variant.
     */
    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    /**
     * Scope a query to only include active variants.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
