<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\GalleryController;
use App\Http\Controllers\Website\BlogController;
use App\Http\Controllers\Website\ContactController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/subscribe', [HomeController::class, 'subscribe'])->name('subscribe');
Route::get('/galleries', [GalleryController::class, 'index'])->name('galleries.index');
Route::get('/galleries/{slug}', [GalleryController::class, 'show'])->name('galleries.show');
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{slug}', [BlogController::class, 'show'])->name('blogs.show');
Route::get('/about-us', [\App\Http\Controllers\Website\PageController::class, 'about'])->name('about-us');
Route::get('/contact-us', [ContactController::class, 'index'])->name('contact-us');
Route::post('/contact-us', [ContactController::class, 'store'])->name('contact-us.store');



require __DIR__ . '/auth.php';
