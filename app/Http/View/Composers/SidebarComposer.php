<?php

namespace App\Http\View\Composers;

use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class SidebarComposer
{
    /**
     * Bind data to the view.
     *
     * Note: Statistics are now only shown on dashboard home page, not in sidebar
     * to reduce database queries and improve performance.
     */
    public function compose(View $view): void
    {
        // No data needed for sidebar anymore
        // Statistics are handled in Dashboard HomeController
    }
}

