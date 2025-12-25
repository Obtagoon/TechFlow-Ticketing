<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Movie;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class ReportController extends Controller
{
    /**
     * Show reports page
     */
    public function index()
    {
        return view('admin.reports.index');
    }

    /**
     * Generate sales report
     */
    public function salesReport(Request $request)
    {
        $validated = $request->validate([
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
        ]);

        $startDate = Carbon::parse($validated['start_date'])->startOfDay();
        $endDate = Carbon::parse($validated['end_date'])->endOfDay();

        // Get bookings in date range
        $bookings = Booking::with(['user', 'showtime.movie', 'showtime.studio.cinema'])
            ->where('status', 'paid')
            ->whereBetween('paid_at', [$startDate, $endDate])
            ->orderBy('paid_at')
            ->get();

        // Summary
        $summary = [
            'total_bookings' => $bookings->count(),
            'total_revenue' => $bookings->sum('total_price'),
            'total_tickets' => $bookings->sum('total_seats'),
            'avg_order_value' => $bookings->count() > 0 ? $bookings->avg('total_price') : 0,
        ];

        // Revenue by movie
        $revenueByMovie = $bookings->groupBy('showtime.movie_id')
            ->map(function ($group) {
                $movie = $group->first()->showtime->movie;
                return [
                    'movie' => $movie->title,
                    'bookings' => $group->count(),
                    'tickets' => $group->sum('total_seats'),
                    'revenue' => $group->sum('total_price'),
                ];
            })
            ->sortByDesc('revenue')
            ->values();

        // Revenue by date
        $revenueByDate = $bookings->groupBy(function ($booking) {
                return $booking->paid_at->format('Y-m-d');
            })
            ->map(function ($group, $date) {
                return [
                    'date' => Carbon::parse($date)->format('d M Y'),
                    'bookings' => $group->count(),
                    'revenue' => $group->sum('total_price'),
                ];
            })
            ->values();

        // For PDF download
        if ($request->has('download')) {
            $pdf = Pdf::loadView('pdf.sales-report', compact(
                'bookings', 'summary', 'revenueByMovie', 'revenueByDate', 'startDate', 'endDate'
            ));
            
            return $pdf->download("laporan-penjualan-{$startDate->format('Ymd')}-{$endDate->format('Ymd')}.pdf");
        }

        return view('admin.reports.sales', compact(
            'bookings', 'summary', 'revenueByMovie', 'revenueByDate', 'startDate', 'endDate'
        ));
    }

    /**
     * Movie performance report
     */
    public function movieReport(Request $request)
    {
        $validated = $request->validate([
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
        ]);

        $startDate = Carbon::parse($validated['start_date'])->startOfDay();
        $endDate = Carbon::parse($validated['end_date'])->endOfDay();

        // Get movies with showtimes in date range
        $movies = Movie::withCount(['showtimes' => function ($query) use ($startDate, $endDate) {
                $query->whereBetween('show_date', [$startDate->toDateString(), $endDate->toDateString()]);
            }])
            ->get()
            ->map(function ($movie) use ($startDate, $endDate) {
                // Calculate total revenue from bookings
                $revenue = Booking::where('status', 'paid')
                    ->whereBetween('paid_at', [$startDate, $endDate])
                    ->whereHas('showtime', function ($q) use ($movie) {
                        $q->where('movie_id', $movie->id);
                    })
                    ->sum('total_price');
                
                $movie->total_revenue = $revenue;
                $movie->total_showtimes = $movie->showtimes_count;
                
                return $movie;
            })
            ->filter(function ($movie) {
                return $movie->total_showtimes > 0;
            })
            ->sortByDesc('total_revenue')
            ->values();

        // For PDF download
        if ($request->has('download')) {
            $pdf = Pdf::loadView('pdf.movie-report', compact('movies', 'startDate', 'endDate'));
            
            return $pdf->download("laporan-film-{$startDate->format('Ymd')}-{$endDate->format('Ymd')}.pdf");
        }

        return view('admin.reports.movies', compact('movies', 'startDate', 'endDate'));
    }
}
