<?php

namespace App\Providers;

use App\Models\Announcement;
use App\Models\Category;
use App\Models\CruiseExperience;
use App\Models\Page;
use App\Models\Setting;
use App\Models\Tour;
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
                'sharedAnnouncements' => $sharedData['announcements'],
                'sharedTermsPage' => $sharedData['termsPage'],
                'sharedPrivacyPage' => $sharedData['privacyPage'],
                'dahbiaCruisesName' => $sharedData['dahbiaCruisesName'],
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

        // Get settings
        $dahbiaCruisesName = Setting::get('dahbia_cruises_name', 'Dahbia Cruises');
        $phone = Setting::get('phone', '+20 101 515 7744 / +20 101 515 7746');
        $email = Setting::get('email', 'info@grandnilecruises.com');
        $address = Setting::get('address', 'Sarayah Zayed 2 Building, Apartment 1,<br>8th District<br>Sheikh Zayed City - Giza');
        $navbarLogo = Setting::get('navbar_logo');
        $footerLogo = Setting::get('footer_logo');

        // No need to load tours for categories - they are just links now
        // Only Dahbia Cruises (from settings) has dropdown with cruise experiences

        return [
            'categories' => $categories,
            'cruiseExperiences' => $cruiseExperiences,
            'announcements' => $announcements,
            'termsPage' => $termsPage,
            'privacyPage' => $privacyPage,
            'dahbiaCruisesName' => $dahbiaCruisesName,
            'phone' => $phone,
            'email' => $email,
            'address' => $address,
            'navbarLogo' => $navbarLogo,
            'footerLogo' => $footerLogo,
        ];
    }
}

