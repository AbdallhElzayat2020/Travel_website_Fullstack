<?php

namespace App\Http\Controllers\Website;

use App\Models\Blog;
use App\Models\Tour;
use App\Models\Slider;
use App\Models\Subscriber;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::active()
            ->orderBy('sort_order')
            ->get();

        $offerTours = Tour::active()
            ->where('has_offer', true)
            ->where('status', 'active')
            ->where(function ($q) {
                $q->whereNull('offer_start_date')
                    ->orWhere('offer_start_date', '<=', now());
            })
            ->where(function ($q) {
                $q->whereNull('offer_end_date')
                    ->orWhere('offer_end_date', '>=', now());
            })
            ->orderBy('sort_order')
            ->latest()
            ->take(2)
            ->get();

        $blogs = Blog::active()
            ->published()
            ->orderBy('sort_order')
            ->latest('published_at')
            ->take(6)
            ->get();

        $homeGalleries = Gallery::active()
            ->published()
            ->homepage()
            ->orderBy('sort_order')
            ->latest('published_at')
            ->take(9)
            ->get();

        $activeTours = Tour::active()
            ->with(['category', 'subCategory', 'country', 'state'])
            ->orderBy('sort_order')
            ->latest()
            ->take(8)
            ->get();

        return view('frontend.pages.home', compact('sliders', 'offerTours', 'blogs', 'homeGalleries', 'activeTours'));
    }

    /**
     * Handle newsletter subscription.
     */
    public function subscribe(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|max:255',
            'name' => 'nullable|string|max:255',
        ]);

        $existing = Subscriber::withTrashed()->where('email', $data['email'])->first();

        if ($existing) {
            $existing->restore();
            $existing->update([
                'name' => $data['name'] ?? $existing->name,
                'is_active' => true,
                'subscribed_at' => now(),
                'unsubscribed_at' => null,
            ]);
        } else {
            Subscriber::create([
                'email' => $data['email'],
                'name' => $data['name'] ?? null,
                'is_active' => true,
                'subscribed_at' => now(),
            ]);
        }

        return redirect()->back()->with('success', 'Subscribed successfully!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
