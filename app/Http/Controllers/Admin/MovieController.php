<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Services\TmdbService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    protected TmdbService $tmdb;

    public function __construct(TmdbService $tmdb)
    {
        $this->tmdb = $tmdb;
    }

    /**
     * Display a listing of movies with search and filter
     */
    public function index(Request $request)
    {
        $query = Movie::query();

        // Live search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('genre', 'like', "%{$search}%");
            });
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by genre
        if ($request->filled('genre')) {
            $query->where('genre', 'like', '%' . $request->genre . '%');
        }

        $movies = $query->orderBy('created_at', 'desc')->paginate(10);

        // For AJAX live search
        if ($request->ajax()) {
            return view('admin.movies.partials.table', compact('movies'));
        }

        // Get unique genres for filter
        $genres = Movie::selectRaw('DISTINCT genre')
            ->whereNotNull('genre')
            ->pluck('genre')
            ->flatMap(fn($g) => explode(', ', $g))
            ->unique()
            ->sort()
            ->values();

        return view('admin.movies.index', compact('movies', 'genres'));
    }

    /**
     * Show the form for creating a new movie
     */
    public function create()
    {
        return view('admin.movies.create');
    }

    /**
     * Store a newly created movie
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'synopsis' => ['nullable', 'string'],
            'poster' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'backdrop' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
            'duration' => ['required', 'integer', 'min:1'],
            'rating' => ['nullable', 'numeric', 'min:0', 'max:10'],
            'genre' => ['nullable', 'string', 'max:255'],
            'release_date' => ['nullable', 'date'],
            'status' => ['required', 'in:now_playing,coming_soon,ended'],
        ]);

        // Handle poster upload
        if ($request->hasFile('poster')) {
            $validated['poster'] = $request->file('poster')->store('movies/posters', 'public');
        }

        // Handle backdrop upload
        if ($request->hasFile('backdrop')) {
            $validated['backdrop'] = $request->file('backdrop')->store('movies/backdrops', 'public');
        }

        $movie = Movie::create($validated);

    $message = 'Film berhasil ditambahkan.';
    if ($movie->status === 'now_playing') {
        $showtimeCount = $movie->showtimes()->count();
        if ($showtimeCount > 0) {
            $message .= " {$showtimeCount} jadwal tayang otomatis dibuat untuk 7 hari ke depan.";
        }
    }

    return redirect()->route('admin.movies.index')
        ->with('success', $message);
    }

    /**
     * Display the specified movie
     */
    public function show(Movie $movie)
    {
        $movie->load(['showtimes' => function ($query) {
            $query->upcoming()->with('studio.cinema');
        }]);

        return view('admin.movies.show', compact('movie'));
    }

    /**
     * Show the form for editing a movie
     */
    public function edit(Movie $movie)
    {
        return view('admin.movies.edit', compact('movie'));
    }

    /**
     * Update the specified movie
     */
    public function update(Request $request, Movie $movie)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'synopsis' => ['nullable', 'string'],
            'poster' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'backdrop' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
            'duration' => ['required', 'integer', 'min:1'],
            'rating' => ['nullable', 'numeric', 'min:0', 'max:10'],
            'genre' => ['nullable', 'string', 'max:255'],
            'release_date' => ['nullable', 'date'],
            'status' => ['required', 'in:now_playing,coming_soon,ended'],
        ]);

        // Handle poster upload
        if ($request->hasFile('poster')) {
            // Delete old poster
            if ($movie->poster && !str_starts_with($movie->poster, 'http')) {
                Storage::disk('public')->delete($movie->poster);
            }
            $validated['poster'] = $request->file('poster')->store('movies/posters', 'public');
        }

        // Handle backdrop upload
        if ($request->hasFile('backdrop')) {
            // Delete old backdrop
            if ($movie->backdrop && !str_starts_with($movie->backdrop, 'http')) {
                Storage::disk('public')->delete($movie->backdrop);
            }
            $validated['backdrop'] = $request->file('backdrop')->store('movies/backdrops', 'public');
        }

        $oldStatus = $movie->status;
    $movie->update($validated);

    $message = 'Film berhasil diperbarui.';
    if ($oldStatus !== 'now_playing' && $movie->status === 'now_playing') {
        $showtimeCount = $movie->showtimes()->where('show_date', '>=', today())->count();
        if ($showtimeCount > 0) {
            $message .= " {$showtimeCount} jadwal tayang otomatis dibuat untuk 7 hari ke depan.";
        }
    }

    return redirect()->route('admin.movies.index')
        ->with('success', $message);
    }

    /**
     * Remove the specified movie
     */
    public function destroy(Movie $movie)
    {
        // Delete images
        if ($movie->poster && !str_starts_with($movie->poster, 'http')) {
            Storage::disk('public')->delete($movie->poster);
        }
        if ($movie->backdrop && !str_starts_with($movie->backdrop, 'http')) {
            Storage::disk('public')->delete($movie->backdrop);
        }

        $movie->delete();

        return redirect()->route('admin.movies.index')
            ->with('success', 'Film berhasil dihapus.');
    }

    /**
     * Search movies from TMDB
     */
    public function searchTmdb(Request $request)
    {
        $query = $request->get('query');
        if (!$query) {
            return response()->json(['results' => []]);
        }

        $results = $this->tmdb->searchMovies($query);
        
        return response()->json($results);
    }

    /**
     * Import movie from TMDB
     */
    public function importTmdb(Request $request)
    {
        $validated = $request->validate([
            'tmdb_id' => ['required', 'integer'],
        ]);

        // Check if already exists
        if (Movie::where('tmdb_id', $validated['tmdb_id'])->exists()) {
            return back()->withErrors(['error' => 'Film ini sudah ada di database.']);
        }

        // Get movie details from TMDB
        $tmdbMovie = $this->tmdb->getMovie($validated['tmdb_id']);
        
        if (!$tmdbMovie || isset($tmdbMovie['error'])) {
            return back()->withErrors(['error' => 'Gagal mengambil data dari TMDB.']);
        }

        // Transform and create
        $movieData = $this->tmdb->transformMovie($tmdbMovie);
        $movieData['status'] = 'coming_soon';
        
        Movie::create($movieData);

        return redirect()->route('admin.movies.index')
            ->with('success', 'Film berhasil diimport dari TMDB.');
    }
}
