<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Showtime;
use Illuminate\Http\JsonResponse;

class SeatController extends Controller
{
    /**
     * Get real-time seat status for a showtime
     */
    public function getStatus(Showtime $showtime): JsonResponse
    {
        $showtime->load('studio.seats');
        
        // Get all active seats
        $allSeats = $showtime->studio->seats()
            ->where('is_active', true)
            ->pluck('id')
            ->toArray();

        // Get booked seat IDs
        $bookedSeatIds = Booking::where('showtime_id', $showtime->id)
            ->whereIn('status', ['pending', 'paid'])
            ->with('seats')
            ->get()
            ->pluck('seats')
            ->flatten()
            ->pluck('id')
            ->toArray();

        // Available seats = all seats - booked seats
        $availableSeatIds = array_diff($allSeats, $bookedSeatIds);

        return response()->json([
            'available' => array_values($availableSeatIds),
            'booked' => $bookedSeatIds,
            'timestamp' => now()->toISOString(),
        ]);
    }
}
