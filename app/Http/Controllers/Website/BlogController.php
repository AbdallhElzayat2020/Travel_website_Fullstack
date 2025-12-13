<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::active()
            ->published()
            ->orderBy('sort_order')
            ->latest('published_at')
            ->paginate(9);

        return view('frontend.pages.blogs.index', compact('blogs'));
    }

    public function show(string $slug)
    {
        $blog = Blog::active()
            ->published()
            ->where('slug', $slug)
            ->firstOrFail();

        // Get related blogs (same category or recent)
        $relatedBlogs = Blog::active()
            ->published()
            ->where('id', '!=', $blog->id)
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        return view('frontend.pages.blogs.show', compact('blog', 'relatedBlogs'));
    }
}
