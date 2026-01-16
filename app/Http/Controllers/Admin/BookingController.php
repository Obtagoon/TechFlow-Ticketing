<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of bookings
     */
    public function index(Request $request)
    {
        $query = Booking::with(['user', 'showtime.movie', 'showtime.studio.cinema']);

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('booking_code', 'like', "%{$search}%")
                  ->orWhereHas('user', function ($uq) use ($search) {
                      $uq->where('name', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%");
                  })
                  ->orWhereHas('showtime.movie', function ($mq) use ($search) {
                      $mq->where('title', 'like', "%{$search}%");
                  });
            });
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by date
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $bookings = $query->orderBy('created_at', 'desc')->paginate(15);

        // AJAX response
        if ($request->ajax()) {
            return view('admin.bookings.partials.table', compact('bookings'));
        }

        return view('admin.bookings.index', compact('bookings'));
    }

    /**
     * Display the specified booking
     */
    public function show(Booking $booking)
    {
        $booking->load(['user', 'showtime.movie', 'showtime.studio.cinema', 'seats']);
        
        return view('admin.bookings.show', compact('booking'));
    }

    /**
     * Update booking status
     */
    public function updateStatus(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'status' => ['required', 'in:pending,paid,cancelled,expired'],
        ]);

        if ($validated['status'] === 'paid' && $booking->status !== 'paid') {
            $booking->markAsPaid($booking->payment_method ?? 'admin');
        } else {
            $booking->update(['status' => $validated['status']]);
        }

        return back()->with('success', 'Status pemesanan berhasil diperbarui.');
    }

    /**
     * Cancel booking
     */
    public function cancel(Booking $booking)
    {
        $booking->cancel();
        
        return back()->with('success', 'Pemesanan berhasil dibatalkan.');
    }
}

