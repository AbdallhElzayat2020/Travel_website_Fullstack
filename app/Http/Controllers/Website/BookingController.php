<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    /**
     * Store a newly created booking.
     */
    public function store(Request $request)
    {
        // Handle selected_variants if it comes as JSON string
        $selectedVariantsInput = $request->input('selected_variants');
        if (is_string($selectedVariantsInput)) {
            $decoded = json_decode($selectedVariantsInput, true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                $request->merge(['selected_variants' => $decoded]);
            } else {
                $request->merge(['selected_variants' => []]);
            }
        }

        $validated = $request->validate([
            'tour_id' => 'required|exists:tours,id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'accommodation_type_id' => 'nullable|exists:tour_seasonal_price_items,id',
            'selected_variants' => 'nullable|array',
            'selected_variants.*' => 'exists:tour_variants,id',
            'total_price' => 'required|numeric|min:0',
        ]);

        $tour = Tour::findOrFail($validated['tour_id']);

        // Ensure selected_variants is an array
        $selectedVariants = $validated['selected_variants'] ?? [];
        if (!is_array($selectedVariants)) {
            $selectedVariants = [];
        }

        $booking = Booking::create([
            'tour_id' => $validated['tour_id'],
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'accommodation_type_id' => $validated['accommodation_type_id'] ?? null,
            'selected_variants' => $selectedVariants,
            'total_price' => $validated['total_price'],
            'status' => 'pending',
        ]);

        return redirect()->route('tours.show', $tour->slug)
            ->with('success', 'Your booking has been submitted successfully! We will contact you soon.');
    }
}
