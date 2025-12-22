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
Route::get('/blogs', [BlogController::class, 'index'])
    ->name('blogs.index');
Route::get('/blogs/{slug}', [BlogController::class, 'show'])
    ->name('blogs.show');
Route::get('/tours/{slug}', [TourController::class, 'show'])
    ->name('tours.show');
Route::get('/nile-cruises', [CruiseExperienceController::class, 'index'])
    ->name('nile-cruises.index');
Route::get('/nile-cruises/{slug}', [CruiseExperienceController::class, 'show'])
    ->name('nile-cruises.show');
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



require __DIR__ . '/auth.php';
