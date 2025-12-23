<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\CruiseExperience;

class CruiseExperienceController extends Controller
{
    /**
     * Show main Nile cruise page (first active cruise experience).
     */
    public function index(\Illuminate\Http\Request $request)
    {
        $experience = CruiseExperience::active()
            ->with(['images'])
            ->orderBy('sort_order')
            ->firstOrFail();

        // Get only the selected related tours
        $relatedTours = $experience->tours()
            ->active()
            ->with(['category', 'country', 'state'])
            ->orderBy('sort_order')
            ->latest()
            ->paginate(15);

        return view('frontend.pages.nile-cruises.show', compact('experience', 'relatedTours'));
    }

    /**
     * Show a single cruise experience page.
     */
    public function show(\Illuminate\Http\Request $request, string $slug)
    {
        $experience = CruiseExperience::active()
            ->with(['images'])
            ->where('slug', $slug)
            ->firstOrFail();

        // Get only the selected related tours
        $relatedTours = $experience->tours()
            ->active()
            ->with(['category', 'country', 'state'])
            ->orderBy('sort_order')
            ->latest()
            ->paginate(15);

        return view('frontend.pages.nile-cruises.show', compact('experience', 'relatedTours'));
    }
}
