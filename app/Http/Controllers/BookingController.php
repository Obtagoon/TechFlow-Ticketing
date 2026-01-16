<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Seat;
use App\Models\Showtime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class BookingController extends Controller
{
    /**
     * Show seat selection page
     */
    public function selectSeats(Showtime $showtime)
    {
        $showtime->load(['movie', 'studio.cinema', 'studio.seats']);
        
        // Get all seats for the studio
        $seats = $showtime->studio->seats()
            ->where('is_active', true)
            ->orderBy('row_label')
            ->orderBy('seat_number')
            ->get();

        // Get booked seat IDs for this showtime
        $bookedSeatIds = Booking::where('showtime_id', $showtime->id)
            ->whereIn('status', ['pending', 'paid'])
            ->with('seats')
            ->get()
            ->pluck('seats')
            ->flatten()
            ->pluck('id')
            ->toArray();

        // Group seats by row
        $seatsByRow = $seats->groupBy('row_label');

        return view('booking.seats', compact('showtime', 'seatsByRow', 'bookedSeatIds'));
    }

    /**
     * Process seat selection and create booking
     */
    public function processSeats(Request $request, Showtime $showtime)
    {
        $validated = $request->validate([
            'seats' => ['required', 'array', 'min:1', 'max:6'],
            'seats.*' => ['exists:seats,id'],
        ]);

        // Check if seats are available
        $bookedSeatIds = Booking::where('showtime_id', $showtime->id)
            ->whereIn('status', ['pending', 'paid'])
            ->with('seats')
            ->get()
            ->pluck('seats')
            ->flatten()
            ->pluck('id')
            ->toArray();

        $selectedSeats = collect($validated['seats']);
        $unavailable = $selectedSeats->intersect($bookedSeatIds);

        if ($unavailable->isNotEmpty()) {
            return back()->withErrors(['seats' => 'Beberapa kursi yang dipilih sudah tidak tersedia.']);
        }

        // Create booking
        DB::beginTransaction();
        try {
            $totalSeats = count($validated['seats']);
            $totalPrice = $showtime->price * $totalSeats;

            $booking = Booking::create([
                'user_id' => Auth::id(),
                'showtime_id' => $showtime->id,
                'total_seats' => $totalSeats,
                'total_price' => $totalPrice,
                'status' => 'pending',
            ]);

            // Attach seats to booking
            $booking->seats()->attach($validated['seats']);

            DB::commit();

            return redirect()->route('booking.checkout', $booking);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Terjadi kesalahan. Silakan coba lagi.']);
        }
    }

    /**
     * Show checkout page
     */
    public function checkout(Booking $booking)
    {
        // Verify ownership
        if ($booking->user_id !== Auth::id()) {
            abort(403);
        }

        // Check if expired
        if ($booking->isExpired()) {
            $booking->update(['status' => 'expired']);
            return redirect()->route('movies.show', $booking->showtime->movie)
                ->withErrors(['error' => 'Waktu pemesanan sudah habis.']);
        }

        $booking->load(['showtime.movie', 'showtime.studio.cinema', 'seats']);

        return view('booking.checkout', compact('booking'));
    }



    /**
     * Show e-ticket
     */
    public function showTicket(Booking $booking)
    {
        // Verify ownership or admin
        if ($booking->user_id !== Auth::id() && !Auth::user()?->isAdmin()) {
            abort(403);
        }

        if ($booking->status !== 'paid') {
            return redirect()->route('my-bookings')
                ->withErrors(['error' => 'E-Ticket hanya tersedia untuk pesanan yang sudah dibayar.']);
        }

        $booking->load(['showtime.movie', 'showtime.studio.cinema', 'seats', 'user']);

        return view('booking.ticket', compact('booking'));
    }

    /**
     * Download e-ticket as PDF
     */
    public function downloadTicket(Booking $booking)
    {
        // Verify ownership or admin
        if ($booking->user_id !== Auth::id() && !Auth::user()?->isAdmin()) {
            abort(403);
        }

        if ($booking->status !== 'paid') {
            abort(403);
        }

        $booking->load(['showtime.movie', 'showtime.studio.cinema', 'seats', 'user']);

        $pdf = Pdf::loadView('pdf.ticket', compact('booking'));
        
        return $pdf->download("ticket-{$booking->booking_code}.pdf");
    }

    /**
     * Show user's bookings
     */
    public function myBookings()
    {
        $bookings = Booking::with(['showtime.movie', 'showtime.studio.cinema', 'seats'])
            ->forUser(Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('user.bookings', compact('bookings'));
    }

    /**
     * Cancel booking
     */
    public function cancel(Booking $booking)
    {
        // Verify ownership
        if ($booking->user_id !== Auth::id()) {
            abort(403);
        }

        if ($booking->status !== 'pending') {
            return back()->withErrors(['error' => 'Hanya pesanan pending yang dapat dibatalkan.']);
        }

        $booking->cancel();

        return back()->with('success', 'Pesanan berhasil dibatalkan.');
    }
}
