<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cinema;
use App\Models\Seat;
use App\Models\Studio;
use Illuminate\Http\Request;

class StudioController extends Controller
{
    /**
     * Display a listing of studios
     */
    public function index(Request $request)
    {
        $query = Studio::with('cinema');

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhereHas('cinema', function ($cq) use ($search) {
                      $cq->where('name', 'like', "%{$search}%");
                  });
            });
        }

        // Filter by cinema
        if ($request->filled('cinema_id')) {
            $query->where('cinema_id', $request->cinema_id);
        }

        // Filter by type
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        $studios = $query->orderBy('cinema_id')->orderBy('name')->paginate(10);

        // AJAX response
        if ($request->ajax()) {
            return view('admin.studios.partials.table', compact('studios'));
        }

        $cinemas = Cinema::active()->orderBy('name')->get();

        return view('admin.studios.index', compact('studios', 'cinemas'));
    }

    /**
     * Show the form for creating a new studio
     */
    public function create()
    {
        $cinemas = Cinema::active()->orderBy('name')->get();
        return view('admin.studios.create', compact('cinemas'));
    }

    /**
     * Store a newly created studio
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'cinema_id' => ['required', 'exists:cinemas,id'],
            'name' => ['required', 'string', 'max:100'],
            'type' => ['required', 'in:regular,imax,premiere,4dx'],
            'rows' => ['required', 'integer', 'min:1', 'max:26'],
            'seats_per_row' => ['required', 'integer', 'min:1', 'max:30'],
            'is_active' => ['boolean'],
        ]);

        $validated['capacity'] = $validated['rows'] * $validated['seats_per_row'];
        $validated['is_active'] = $request->boolean('is_active', true);

        $studio = Studio::create($validated);

        // Generate seats
        $this->generateSeats($studio);

        return redirect()->route('admin.studios.index')
            ->with('success', 'Studio berhasil ditambahkan dengan ' . $validated['capacity'] . ' kursi.');
    }

    /**
     * Display the specified studio
     */
    public function show(Studio $studio)
    {
        $studio->load(['cinema', 'seats', 'showtimes' => function ($query) {
            $query->upcoming()->with('movie');
        }]);

        $seatsByRow = $studio->seats->groupBy('row_label');

        return view('admin.studios.show', compact('studio', 'seatsByRow'));
    }

    /**
     * Show the form for editing a studio
     */
    public function edit(Studio $studio)
    {
        $cinemas = Cinema::active()->orderBy('name')->get();
        return view('admin.studios.edit', compact('studio', 'cinemas'));
    }

    /**
     * Update the specified studio
     */
    public function update(Request $request, Studio $studio)
    {
        $validated = $request->validate([
            'cinema_id' => ['required', 'exists:cinemas,id'],
            'name' => ['required', 'string', 'max:100'],
            'type' => ['required', 'in:regular,imax,premiere,4dx'],
            'is_active' => ['boolean'],
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);

        $studio->update($validated);

        return redirect()->route('admin.studios.index')
            ->with('success', 'Studio berhasil diperbarui.');
    }

    /**
     * Remove the specified studio
     */
    public function destroy(Studio $studio)
    {
        $studio->delete();

        return redirect()->route('admin.studios.index')
            ->with('success', 'Studio berhasil dihapus.');
    }

    /**
     * Generate seats for a studio
     */
    protected function generateSeats(Studio $studio): void
    {
        $seats = [];
        $rowLabels = range('A', 'Z');

        for ($row = 0; $row < $studio->rows; $row++) {
            for ($seat = 1; $seat <= $studio->seats_per_row; $seat++) {
                $seats[] = [
                    'studio_id' => $studio->id,
                    'row_label' => $rowLabels[$row],
                    'seat_number' => $seat,
                    'is_active' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        Seat::insert($seats);
    }

    /**
     * Regenerate seats for a studio
     */
    public function regenerateSeats(Request $request, Studio $studio)
    {
        $validated = $request->validate([
            'rows' => ['required', 'integer', 'min:1', 'max:26'],
            'seats_per_row' => ['required', 'integer', 'min:1', 'max:30'],
        ]);

        // Delete existing seats
        $studio->seats()->delete();

        // Update studio
        $studio->update([
            'rows' => $validated['rows'],
            'seats_per_row' => $validated['seats_per_row'],
            'capacity' => $validated['rows'] * $validated['seats_per_row'],
        ]);

        // Generate new seats
        $this->generateSeats($studio);

        return back()->with('success', 'Kursi berhasil di-generate ulang.');
    }
}
