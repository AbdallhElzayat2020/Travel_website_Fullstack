<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Booking::with(['tour', 'accommodationType']);

        // Filter by status if provided
        if ($request->has('status') && in_array($request->status, ['pending', 'confirmed', 'cancelled'])) {
            $query->where('status', $request->status);
        }

        $bookings = $query->orderBy('created_at', 'desc')->paginate(perPage: 15);

        return view('dashboard.bookings.index', compact('bookings'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->load(['tour', 'accommodationType']);
        return view('dashboard.bookings.show', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled',
            'notes' => 'nullable|string',
        ]);

        $oldStatus = $booking->status;

        // Update only the validated fields
        $booking->status = $validated['status'];
        if (isset($validated['notes'])) {
            $booking->notes = $validated['notes'];
        }
        $booking->save();

        $newStatus = $validated['status'];

        // Redirect to the new status filter (so the booking appears in the correct list)
        $redirectUrl = route('admin.bookings.index', ['status' => $newStatus]);

        return redirect($redirectUrl)
            ->with('success', 'Booking status updated from ' . ucfirst($oldStatus) . ' to ' . ucfirst($newStatus) . ' successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Booking deleted successfully');
    }
}
