<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourImage extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'tour_id',
        'image',
        'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];

    /**
     * Get the tour that owns the tour image.
     */
    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
