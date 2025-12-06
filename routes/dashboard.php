<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\{
    HomeController,
    CategoryController,
    SubCategoryController,
    ProfileController as DashboardProfileController,
    UserController,
    RoleController,
    ContactController,
    SubscriberController,
    SliderController,
    TestimonialController,
    FaqController,
};

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {

    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    // Categories Routes
    Route::resource('categories', CategoryController::class);

    // Sub Categories Routes
    Route::resource('sub-categories', SubCategoryController::class);

    // Profile Routes
    Route::get('/profile', [DashboardProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [DashboardProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [DashboardProfileController::class, 'updatePassword'])->name('profile.password.update');

    // Users Routes
    Route::resource('users', UserController::class);

    // Roles Routes
    Route::resource('roles', RoleController::class);

    // Contacts Routes
    Route::resource('contacts', ContactController::class)->only(['index', 'show', 'destroy']);
    Route::post('contacts/{id}/mark-read', [ContactController::class, 'markAsRead'])->name('contacts.mark-read');
    Route::post('contacts/{id}/mark-unread', [ContactController::class, 'markAsUnread'])->name('contacts.mark-unread');

    // Subscribers Routes
    Route::resource('subscribers', SubscriberController::class)->only(['index', 'destroy']);
    Route::patch('subscribers/{subscriber}/toggle-status', [SubscriberController::class, 'toggleStatus'])->name('subscribers.toggle-status');

    // Sliders Routes
    Route::resource('sliders', SliderController::class);

    // Testimonials Routes
    Route::resource('testimonials', TestimonialController::class);

    // FAQs Routes
    Route::resource('faqs', FaqController::class);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
