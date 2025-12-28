<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Showtime;
use App\Services\TmdbService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected TmdbService $tmdb;

    public function __construct(TmdbService $tmdb)
    {
        $this->tmdb = $tmdb;
    }

    /**
     * Show the landing page
     */
    public function index()
    {
        // Get now playing movies from database
        $nowPlaying = Movie::nowPlaying()
            ->orderBy('release_date', 'desc')
            ->take(8)
            ->get();

        // Get coming soon movies from database
        $comingSoon = Movie::comingSoon()
            ->orderBy('release_date', 'asc')
            ->take(8)
            ->get();

        // Get movies with showtimes today
        $todayShowtimes = Showtime::with(['movie', 'studio.cinema'])
            ->today()
            ->upcoming()
            ->take(10)
            ->get()
            ->groupBy('movie_id');

        return view('welcome', compact('nowPlaying', 'comingSoon', 'todayShowtimes'));
    }

    /**
     * Show all movies
     */
    public function movies(Request $request)
    {
        $query = Movie::query();

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by genre
        if ($request->filled('genre')) {
            $query->where('genre', 'like', '%' . $request->genre . '%');
        }

        // Search
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $movies = $query->orderBy('release_date', 'desc')->paginate(12);

        // Get unique genres for filter
        $genres = Movie::selectRaw('DISTINCT genre')
            ->whereNotNull('genre')
            ->pluck('genre')
            ->flatMap(fn($g) => explode(', ', $g))
            ->unique()
            ->sort()
            ->values();

        return view('movies.index', compact('movies', 'genres'));
    }

    /**
     * Show single movie details
     */
    public function showMovie(Movie $movie)
    {
        // Get showtimes grouped by date and cinema
        $showtimes = Showtime::with(['studio.cinema'])
            ->where('movie_id', $movie->id)
            ->where('is_active', true)
            ->upcoming()
            ->get()
            ->groupBy(function ($showtime) {
                return $showtime->show_date->format('Y-m-d');
            })
            ->map(function ($dateGroup) {
                return $dateGroup->groupBy(function ($showtime) {
                    return $showtime->studio->cinema->id;
                });
            });

        // Get available dates for the date selector tabs
        $dates = $showtimes->keys()->sort()->values();

        return view('movies.show', compact('movie', 'showtimes', 'dates'));
    }
}
