<?php

namespace App\Http\View\Composers;

use App\Models\Announcement;
use App\Models\Category;
use App\Models\CruiseExperience;
use App\Models\Page;
use Illuminate\View\View;

class LayoutComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        // Get all active categories once (used in navbar and footer)
        $categories = Category::where('status', 'active')
            ->orderBy('sort_order')
            ->get();

        // Get all active cruise experiences once (used in navbar and footer)
        $cruiseExperiences = CruiseExperience::active()
            ->orderBy('sort_order')
            ->get();

        // Get active announcements (used in navbar)
        $announcements = Announcement::where('status', 'active')
            ->orderBy('sort_order')
            ->get();

        // Get static pages for footer
        $termsPage = Page::where('slug', 'terms-and-conditions')
            ->where('status', 'active')
            ->first();

        $privacyPage = Page::where('slug', 'privacy-policy')
            ->where('status', 'active')
            ->first();

        // Share data with all views
        $view->with([
            'sharedCategories' => $categories,
            'sharedCruiseExperiences' => $cruiseExperiences,
            'sharedAnnouncements' => $announcements,
            'sharedTermsPage' => $termsPage,
            'sharedPrivacyPage' => $privacyPage,
        ]);
    }
}
