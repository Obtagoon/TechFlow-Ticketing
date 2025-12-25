<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Movie;
use App\Models\User;
use App\Models\Cinema;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Show admin dashboard
     */
    public function index()
    {
        // Get statistics
        $stats = [
            'total_movies' => Movie::count(),
            'now_playing' => Movie::nowPlaying()->count(),
            'total_bookings' => Booking::count(),
            'total_revenue' => Booking::where('status', 'paid')->sum('total_price'),
            'today_bookings' => Booking::whereDate('created_at', today())->count(),
            'today_revenue' => Booking::where('status', 'paid')
                ->whereDate('paid_at', today())
                ->sum('total_price'),
            'total_users' => User::where('role', 'user')->count(),
            'total_cinemas' => Cinema::count(),
        ];

        // Recent bookings
        $recentBookings = Booking::with(['user', 'showtime.movie'])
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        // Popular movies this week
        $popularMovies = Movie::withCount(['showtimes' => function ($query) {
                $query->whereHas('bookings', function ($q) {
                    $q->where('status', 'paid')
                      ->where('paid_at', '>=', Carbon::now()->subWeek());
                });
            }])
            ->orderByDesc('showtimes_count')
            ->take(5)
            ->get();

        // Revenue chart data (last 7 days)
        $revenueData = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $revenue = Booking::where('status', 'paid')
                ->whereDate('paid_at', $date)
                ->sum('total_price');
            $revenueData[] = [
                'date' => $date->format('d M'),
                'revenue' => $revenue,
            ];
        }

        return view('admin.dashboard', compact('stats', 'recentBookings', 'popularMovies', 'revenueData'));
    }
}
