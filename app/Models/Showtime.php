<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Showtime extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_id',
        'studio_id',
        'show_date',
        'show_time',
        'price',
        'is_active',
    ];

    protected $casts = [
        'show_date' => 'date',
        'price' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    /**
     * Get the movie for the showtime.
     */
    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }

    /**
     * Get the studio for the showtime.
     */
    public function studio(): BelongsTo
    {
        return $this->belongsTo(Studio::class);
    }

    /**
     * Get the bookings for the showtime.
     */
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Get formatted time
     */
    public function getFormattedTimeAttribute(): string
    {
        return $this->show_time;
    }

    /**
     * Get formatted date
     */
    public function getFormattedDateAttribute(): string
    {
        return $this->show_date->format('d M Y');
    }

    /**
     * Get formatted price
     */
    public function getFormattedPriceAttribute(): string
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    /**
     * Get available seats count
     */
    public function getAvailableSeatsCountAttribute(): int
    {
        $totalSeats = $this->studio->seats()->where('is_active', true)->count();
        $bookedSeats = $this->bookings()
            ->whereIn('status', ['pending', 'paid'])
            ->withCount('seats')
            ->get()
            ->sum('seats_count');
        
        return $totalSeats - $bookedSeats;
    }

    /**
     * Scope for today's showtimes
     */
    public function scopeToday($query)
    {
        return $query->whereDate('show_date', today());
    }

    /**
     * Scope for upcoming showtimes
     */
    public function scopeUpcoming($query)
    {
        return $query->where('show_date', '>=', today())
            ->orderBy('show_date')
            ->orderBy('show_time');
    }
}
