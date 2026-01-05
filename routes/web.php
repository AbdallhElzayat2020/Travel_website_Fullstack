<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\{
    HomeController,
    PageController,
    GalleryController,
    BlogController,
    ContactController,
    TourController,
    CruiseExperienceController,
    BookingController,
};



Route::get('/', [HomeController::class, 'index'])
    ->name('home');
Route::post('/subscribe', [HomeController::class, 'subscribe'])
    ->name('subscribe');
Route::get('/galleries', [GalleryController::class, 'index'])
    ->name('galleries.index');
Route::get('/galleries/{slug}', [GalleryController::class, 'show'])
    ->name('galleries.show');
Route::get('/blog', [BlogController::class, 'index'])
    ->name('blogs.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])
    ->name('blogs.show');
Route::get('/category/{slug}', [TourController::class, 'byCategory'])
    ->name('tours.category');
Route::get('/tours/{slug}', [TourController::class, 'show'])
    ->name('tours.show');
// Cruise Groups routes - slugs will be handled dynamically via route helper
// Use try-catch to ensure routes are always registered even if settings are missing
try {
    $group1Slug = \App\Models\Setting::get('cruise_group_1_slug', 'dahabiya-cruises');
    $group2Slug = \App\Models\Setting::get('cruise_group_2_slug', 'ultra-deluxe-dahabiya');
    $group3Slug = \App\Models\Setting::get('cruise_group_3_slug', 'grand-nile-cruises');
} catch (\Exception $e) {
    // Fallback to defaults if settings table doesn't exist or query fails
    $group1Slug = 'dahabiya-cruises';
    $group2Slug = 'ultra-deluxe-dahabiya';
    $group3Slug = 'grand-nile-cruises';
}

// Group 1: Dahabiya Cruises
Route::get('/' . $group1Slug, [CruiseExperienceController::class, 'index'])
    ->defaults('group_key', 'dahabiya')
    ->name('cruise-group-1.index');
Route::get('/' . $group1Slug . '/{slug}', [CruiseExperienceController::class, 'show'])
    ->defaults('group_key', 'dahabiya')
    ->name('cruise-group-1.show');

// Group 2: Ultra Deluxe Dahabiya
Route::get('/' . $group2Slug, [CruiseExperienceController::class, 'index'])
    ->defaults('group_key', 'ultra')
    ->name('cruise-group-2.index');
Route::get('/' . $group2Slug . '/{slug}', [CruiseExperienceController::class, 'show'])
    ->defaults('group_key', 'ultra')
    ->name('cruise-group-2.show');

// Group 3: Grand Nile Cruises
Route::get('/' . $group3Slug, [CruiseExperienceController::class, 'index'])
    ->defaults('group_key', 'grand')
    ->name('cruise-group-3.index');
Route::get('/' . $group3Slug . '/{slug}', [CruiseExperienceController::class, 'show'])
    ->defaults('group_key', 'grand')
    ->name('cruise-group-3.show');
Route::get('/about-us', [PageController::class, 'about'])
    ->name('about-us');
Route::get('/faqs', [PageController::class, 'faqs'])
    ->name('faqs');
Route::get('/contact-us', [ContactController::class, 'index'])
    ->name('contact-us');
Route::post('/contact-us', [ContactController::class, 'store'])
    ->name('contact-us.store');
Route::post('/bookings', [BookingController::class, 'store'])
    ->name('bookings.store');

// Terms and Conditions & Privacy Policy
Route::get('/terms-and-conditions', [PageController::class, 'termsAndConditions'])
    ->name('terms-and-conditions');
Route::get('/privacy-policy', [PageController::class, 'privacyPolicy'])
    ->name('privacy-policy');



require __DIR__ . '/auth.php';
