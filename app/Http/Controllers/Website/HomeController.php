<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Tour;
use Illuminate\Http\Request;

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

        return view('frontend.pages.home', compact('sliders', 'offerTours'));
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
