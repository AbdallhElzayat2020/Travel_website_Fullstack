<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Page;

class PageController extends Controller
{
    public function about()
    {
        $page = Page::getBySlug('about-us') ?? new Page([
            'slug' => 'about-us',
            'name' => 'About Us',
            'meta_title' => 'About Us',
        ]);

        return view('frontend.pages.about', compact('page'));
    }
}
