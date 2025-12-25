<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cinema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CinemaController extends Controller
{
    /**
     * Display a listing of cinemas
     */
    public function index(Request $request)
    {
        $query = Cinema::withCount('studios');

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('city', 'like', "%{$search}%")
                  ->orWhere('address', 'like', "%{$search}%");
            });
        }

        // Filter by city
        if ($request->filled('city')) {
            $query->where('city', $request->city);
        }

        $cinemas = $query->orderBy('name')->paginate(10);

        // AJAX response
        if ($request->ajax()) {
            return view('admin.cinemas.partials.table', compact('cinemas'));
        }

        // Get unique cities for filter
        $cities = Cinema::distinct()->pluck('city')->sort();

        return view('admin.cinemas.index', compact('cinemas', 'cities'));
    }

    /**
     * Show the form for creating a new cinema
     */
    public function create()
    {
        return view('admin.cinemas.create');
    }

    /**
     * Store a newly created cinema
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string', 'max:100'],
            'phone' => ['nullable', 'string', 'max:20'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'is_active' => ['boolean'],
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('cinemas', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active', true);

        Cinema::create($validated);

        return redirect()->route('admin.cinemas.index')
            ->with('success', 'Bioskop berhasil ditambahkan.');
    }

    /**
     * Display the specified cinema
     */
    public function show(Cinema $cinema)
    {
        $cinema->load(['studios.showtimes' => function ($query) {
            $query->upcoming()->with('movie');
        }]);

        return view('admin.cinemas.show', compact('cinema'));
    }

    /**
     * Show the form for editing a cinema
     */
    public function edit(Cinema $cinema)
    {
        return view('admin.cinemas.edit', compact('cinema'));
    }

    /**
     * Update the specified cinema
     */
    public function update(Request $request, Cinema $cinema)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string', 'max:100'],
            'phone' => ['nullable', 'string', 'max:20'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'is_active' => ['boolean'],
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($cinema->image) {
                Storage::disk('public')->delete($cinema->image);
            }
            $validated['image'] = $request->file('image')->store('cinemas', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active', true);

        $cinema->update($validated);

        return redirect()->route('admin.cinemas.index')
            ->with('success', 'Bioskop berhasil diperbarui.');
    }

    /**
     * Remove the specified cinema
     */
    public function destroy(Cinema $cinema)
    {
        // Delete image
        if ($cinema->image) {
            Storage::disk('public')->delete($cinema->image);
        }

        $cinema->delete();

        return redirect()->route('admin.cinemas.index')
            ->with('success', 'Bioskop berhasil dihapus.');
    }
}
