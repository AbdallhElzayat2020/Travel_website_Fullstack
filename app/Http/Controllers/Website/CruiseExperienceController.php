<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\CruiseExperience;

class CruiseExperienceController extends Controller
{
    /**
     * Show main cruise page (first active cruise experience for the group).
     */
    public function index(\Illuminate\Http\Request $request)
    {
        $groupKey = $request->route('group_key', 'dahabiya');

        $experience = CruiseExperience::active()
            ->byGroup($groupKey)
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

        return view('frontend.pages.nile-cruises.show', compact('experience', 'relatedTours', 'groupKey'));
    }

    /**
     * Show a single cruise experience page.
     */
    public function show(\Illuminate\Http\Request $request, string $slug)
    {
        $groupKey = $request->route('group_key', 'dahabiya');

        $experience = CruiseExperience::active()
            ->byGroup($groupKey)
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

        return view('frontend.pages.nile-cruises.show', compact('experience', 'relatedTours', 'groupKey'));
    }
}
