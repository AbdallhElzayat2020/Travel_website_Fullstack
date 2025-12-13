<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::orderBy('name')->get();
        return view('dashboard.pages.index', compact('pages'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        return view('dashboard.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        $validated = $request->validate([
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_author' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:500',
        ]);

        $page->update($validated);

        return redirect()->route('admin.pages.index')
            ->with('success', 'Page SEO updated successfully');
    }
}
