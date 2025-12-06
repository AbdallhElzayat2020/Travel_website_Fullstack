<?php

namespace App\Providers;

use App\Models\Contact;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share unread contacts count with all views
        View::composer('dashboard.layouts.sidebar', function ($view) {
            $unreadContactsCount = Contact::where('is_read', false)->count();
            $view->with('unreadContactsCount', $unreadContactsCount);
        });
    }
}
