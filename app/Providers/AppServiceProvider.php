<?php

namespace App\Providers;

use App\Http\View\Composers\LayoutComposer;
use App\Models\Contact;
use Illuminate\Pagination\Paginator;
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
        Paginator::useTailwind();
        Paginator::useBootstrapFive();

        // Share unread contacts count with dashboard sidebar
        View::composer('dashboard.layouts.sidebar', function ($view) {
            $unreadContactsCount = Contact::where('is_read', false)->count();
            $view->with('unreadContactsCount', $unreadContactsCount);
        });

        // Share common data with main frontend layout once (navbar & footer inherit it)
        View::composer('frontend.layouts.master', LayoutComposer::class);
    }
}
