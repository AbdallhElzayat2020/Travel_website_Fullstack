<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CruiseExperienceImage extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'cruise_experience_id',
        'image',
        'sort_order',
    ];

    public function cruiseExperience()
    {
        return $this->belongsTo(CruiseExperience::class);
    }
}
