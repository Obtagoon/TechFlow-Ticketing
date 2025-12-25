<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cinema;
use App\Models\Movie;
use App\Models\Showtime;
use App\Models\Studio;
use Illuminate\Http\Request;

class ShowtimeController extends Controller
{
    /**
     * Display a listing of showtimes
     */
    public function index(Request $request)
    {
        $query = Showtime::with(['movie', 'studio.cinema']);

        // Search by movie
        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('movie', function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%");
            });
        }

        // Filter by movie
        if ($request->filled('movie_id')) {
            $query->where('movie_id', $request->movie_id);
        }

        // Filter by date
        if ($request->filled('date')) {
            $query->whereDate('show_date', $request->date);
        }

        // Filter by cinema
        if ($request->filled('cinema_id')) {
            $query->whereHas('studio', function ($q) use ($request) {
                $q->where('cinema_id', $request->cinema_id);
            });
        }

        // Filter by studio
        if ($request->filled('studio_id')) {
            $query->where('studio_id', $request->studio_id);
        }

        $showtimes = $query->orderBy('show_date')
            ->orderBy('show_time')
            ->paginate(15);

        // AJAX response
        if ($request->ajax()) {
            return view('admin.showtimes.partials.table', compact('showtimes'));
        }

        $movies = Movie::whereIn('status', ['now_playing', 'coming_soon'])->orderBy('title')->get();
        $studios = Studio::with('cinema')->active()->get();
        $cinemas = Cinema::orderBy('name')->get();

        return view('admin.showtimes.index', compact('showtimes', 'movies', 'studios', 'cinemas'));
    }

    /**
     * Show the form for creating a new showtime
     */
    public function create()
    {
        $movies = Movie::whereIn('status', ['now_playing', 'coming_soon'])->orderBy('title')->get();
        $studios = Studio::with('cinema')->active()->get();
        
        return view('admin.showtimes.create', compact('movies', 'studios'));
    }

    /**
     * Store a newly created showtime
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'movie_id' => ['required', 'exists:movies,id'],
            'studio_id' => ['required', 'exists:studios,id'],
            'show_date' => ['required', 'date', 'after_or_equal:today'],
            'show_time' => ['required', 'date_format:H:i'],
            'price' => ['required', 'numeric', 'min:0'],
            'is_active' => ['boolean'],
        ]);

        // Check for conflict
        $conflict = Showtime::where('studio_id', $validated['studio_id'])
            ->where('show_date', $validated['show_date'])
            ->where('show_time', $validated['show_time'])
            ->exists();

        if ($conflict) {
            return back()->withErrors(['show_time' => 'Jadwal tayang sudah ada untuk studio dan waktu tersebut.'])
                ->withInput();
        }

        $validated['is_active'] = $request->boolean('is_active', true);

        Showtime::create($validated);

        return redirect()->route('admin.showtimes.index')
            ->with('success', 'Jadwal tayang berhasil ditambahkan.');
    }

    /**
     * Show the form for editing a showtime
     */
    public function edit(Showtime $showtime)
    {
        $movies = Movie::whereIn('status', ['now_playing', 'coming_soon'])->orderBy('title')->get();
        $studios = Studio::with('cinema')->active()->get();
        
        return view('admin.showtimes.edit', compact('showtime', 'movies', 'studios'));
    }

    /**
     * Update the specified showtime
     */
    public function update(Request $request, Showtime $showtime)
    {
        $validated = $request->validate([
            'movie_id' => ['required', 'exists:movies,id'],
            'studio_id' => ['required', 'exists:studios,id'],
            'show_date' => ['required', 'date'],
            'show_time' => ['required', 'date_format:H:i'],
            'price' => ['required', 'numeric', 'min:0'],
            'is_active' => ['boolean'],
        ]);

        // Check for conflict (excluding current)
        $conflict = Showtime::where('studio_id', $validated['studio_id'])
            ->where('show_date', $validated['show_date'])
            ->where('show_time', $validated['show_time'])
            ->where('id', '!=', $showtime->id)
            ->exists();

        if ($conflict) {
            return back()->withErrors(['show_time' => 'Jadwal tayang sudah ada untuk studio dan waktu tersebut.'])
                ->withInput();
        }

        $validated['is_active'] = $request->boolean('is_active', true);

        $showtime->update($validated);

        return redirect()->route('admin.showtimes.index')
            ->with('success', 'Jadwal tayang berhasil diperbarui.');
    }

    /**
     * Remove the specified showtime
     */
    public function destroy(Showtime $showtime)
    {
        // Check if has bookings
        if ($showtime->bookings()->exists()) {
            return back()->withErrors(['error' => 'Tidak dapat menghapus jadwal yang sudah memiliki pemesanan.']);
        }

        $showtime->delete();

        return redirect()->route('admin.showtimes.index')
            ->with('success', 'Jadwal tayang berhasil dihapus.');
    }

    /**
     * Bulk create showtimes
     */
    public function bulkCreate(Request $request)
    {
        $validated = $request->validate([
            'movie_id' => ['required', 'exists:movies,id'],
            'studio_ids' => ['required', 'array'],
            'studio_ids.*' => ['exists:studios,id'],
            'dates' => ['required', 'array'],
            'dates.*' => ['date', 'after_or_equal:today'],
            'times' => ['required', 'array'],
            'times.*' => ['date_format:H:i'],
            'price' => ['required', 'numeric', 'min:0'],
        ]);

        $created = 0;
        $skipped = 0;

        foreach ($validated['studio_ids'] as $studioId) {
            foreach ($validated['dates'] as $date) {
                foreach ($validated['times'] as $time) {
                    // Check for conflict
                    $exists = Showtime::where('studio_id', $studioId)
                        ->where('show_date', $date)
                        ->where('show_time', $time)
                        ->exists();

                    if ($exists) {
                        $skipped++;
                        continue;
                    }

                    Showtime::create([
                        'movie_id' => $validated['movie_id'],
                        'studio_id' => $studioId,
                        'show_date' => $date,
                        'show_time' => $time,
                        'price' => $validated['price'],
                        'is_active' => true,
                    ]);
                    $created++;
                }
            }
        }

        return redirect()->route('admin.showtimes.index')
            ->with('success', "Berhasil membuat {$created} jadwal tayang. {$skipped} jadwal dilewati karena konflik.");
    }
}
