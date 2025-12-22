<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\CruiseExperience;

class CruiseExperienceController extends Controller
{
    /**
     * Show main Nile cruise page (first active cruise experience).
     */
    public function index()
    {
        $experience = CruiseExperience::active()
            ->with([
                'images',
                'tours' => function ($query) {
                    $query->active()
                        ->with(['category', 'country'])
                        ->orderBy('sort_order')
                        ->latest();
                },
            ])
            ->orderBy('sort_order')
            ->firstOrFail();

        // Reuse the same view structure as individual cruise pages
        return view('frontend.pages.nile-cruises.show', compact('experience'));
    }

    /**
     * Show a single cruise experience page.
     */
    public function show(string $slug)
    {
        $experience = CruiseExperience::active()
            ->with([
                'images',
                'tours' => function ($query) {
                    $query->active()
                        ->with(['category', 'country'])
                        ->orderBy('sort_order')
                        ->latest();
                },
            ])
            ->where('slug', $slug)
            ->firstOrFail();

        return view('frontend.pages.nile-cruises.show', compact('experience'));
    }
}
