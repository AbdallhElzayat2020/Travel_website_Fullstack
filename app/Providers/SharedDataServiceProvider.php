<?php

namespace App\Providers;

use App\Models\Announcement;
use App\Models\Category;
use App\Models\CruiseExperience;
use App\Models\Page;
use App\Models\Setting;
use App\Models\Tour;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class SharedDataServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Register shared data as singleton to ensure it's loaded only once
        $this->app->singleton('shared.data', function ($app) {
            return $this->loadSharedData();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Share data with all frontend views using view composer
        view()->composer(['frontend.*', 'frontend.layouts.*', 'frontend.pages.*'], function ($view) {
            $sharedData = app('shared.data');

            $view->with([
                'sharedCategories' => $sharedData['categories'],
                'sharedCruiseExperiences' => $sharedData['cruiseExperiences'],
                'sharedCruiseGroup1Experiences' => $sharedData['cruiseGroup1Experiences'],
                'sharedCruiseGroup2Experiences' => $sharedData['cruiseGroup2Experiences'],
                'sharedCruiseGroup3Experiences' => $sharedData['cruiseGroup3Experiences'],
                'sharedAnnouncements' => $sharedData['announcements'],
                'sharedTermsPage' => $sharedData['termsPage'],
                'sharedPrivacyPage' => $sharedData['privacyPage'],
                'mainCruisesMenuName' => $sharedData['mainCruisesMenuName'],
                'cruiseGroup1Name' => $sharedData['cruiseGroup1Name'],
                'cruiseGroup1Slug' => $sharedData['cruiseGroup1Slug'],
                'cruiseGroup2Name' => $sharedData['cruiseGroup2Name'],
                'cruiseGroup2Slug' => $sharedData['cruiseGroup2Slug'],
                'cruiseGroup3Name' => $sharedData['cruiseGroup3Name'],
                'cruiseGroup3Slug' => $sharedData['cruiseGroup3Slug'],
                'sitePhone' => $sharedData['phone'],
                'siteEmail' => $sharedData['email'],
                'siteAddress' => $sharedData['address'],
                'navbarLogo' => $sharedData['navbarLogo'],
                'footerLogo' => $sharedData['footerLogo'],
            ]);
        });
    }

    /**
     * Load all shared data once
     */
    protected function loadSharedData(): array
    {
        // Get all active categories once (used in navbar and footer)
        $categories = Category::where('status', 'active')
            ->orderBy('sort_order')
            ->get();

        // Get all active cruise experiences once (used in navbar and footer) with eager loading
        $cruiseExperiences = CruiseExperience::active()
            ->with('images')
            ->orderBy('sort_order')
            ->get();

        // Group cruise experiences by group_key from already loaded data (no extra queries)
        $cruiseGroup1Experiences = $cruiseExperiences->where('group_key', 'dahabiya')->values();
        $cruiseGroup2Experiences = $cruiseExperiences->where('group_key', 'ultra')->values();
        $cruiseGroup3Experiences = $cruiseExperiences->where('group_key', 'grand')->values();

        // Get active announcements (used in navbar)
        $announcements = Announcement::where('status', 'active')
            ->orderBy('sort_order')
            ->get();

        // Get static pages for footer (cached, single query)
        $staticPages = Cache::remember('static_pages', 3600, function () {
            return Page::whereIn('slug', ['terms-and-conditions', 'privacy-policy'])
                ->where('status', 'active')
                ->get()
                ->keyBy('slug');
        });

        $termsPage = $staticPages->get('terms-and-conditions');
        $privacyPage = $staticPages->get('privacy-policy');

        // Get all settings in one query (cached) - only once
        $settings = Setting::getAll();

        // Get settings from cached array
        $mainCruisesMenuName = $settings['main_cruises_menu_name'] ?? 'Dahabiya & Cruises';
        $cruiseGroup1Name = $settings['cruise_group_1_name'] ?? 'Dahabiya Cruises';
        $cruiseGroup1Slug = $settings['cruise_group_1_slug'] ?? 'dahabiya-cruises';
        $cruiseGroup2Name = $settings['cruise_group_2_name'] ?? 'Ultra Deluxe Dahabiya';
        $cruiseGroup2Slug = $settings['cruise_group_2_slug'] ?? 'ultra-deluxe-dahabiya';
        $cruiseGroup3Name = $settings['cruise_group_3_name'] ?? 'Grand Nile Cruises';
        $cruiseGroup3Slug = $settings['cruise_group_3_slug'] ?? 'grand-nile-cruises';

        // Get settings from cached array
        $phone = $settings['phone'] ?? '+20 101 515 7744 / +20 101 515 7746';
        $email = $settings['email'] ?? 'info@grandnilecruises.com';
        $address = $settings['address'] ?? 'Sarayah Zayed 2 Building, Apartment 1,<br>8th District<br>Sheikh Zayed City - Giza';
        $navbarLogo = $settings['navbar_logo'] ?? null;
        $footerLogo = $settings['footer_logo'] ?? null;

        return [
            'categories' => $categories,
            'cruiseExperiences' => $cruiseExperiences,
            'cruiseGroup1Experiences' => $cruiseGroup1Experiences,
            'cruiseGroup2Experiences' => $cruiseGroup2Experiences,
            'cruiseGroup3Experiences' => $cruiseGroup3Experiences,
            'announcements' => $announcements,
            'termsPage' => $termsPage,
            'privacyPage' => $privacyPage,
            'mainCruisesMenuName' => $mainCruisesMenuName,
            'cruiseGroup1Name' => $cruiseGroup1Name,
            'cruiseGroup1Slug' => $cruiseGroup1Slug,
            'cruiseGroup2Name' => $cruiseGroup2Name,
            'cruiseGroup2Slug' => $cruiseGroup2Slug,
            'cruiseGroup3Name' => $cruiseGroup3Name,
            'cruiseGroup3Slug' => $cruiseGroup3Slug,
            'phone' => $phone,
            'email' => $email,
            'address' => $address,
            'navbarLogo' => $navbarLogo,
            'footerLogo' => $footerLogo,
        ];
    }
}

