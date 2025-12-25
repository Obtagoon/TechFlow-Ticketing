<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Seat extends Model
{
    use HasFactory;

    protected $fillable = [
        'studio_id',
        'row_label',
        'seat_number',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the studio that owns the seat.
     */
    public function studio(): BelongsTo
    {
        return $this->belongsTo(Studio::class);
    }

    /**
     * Get the bookings for the seat.
     */
    public function bookings(): BelongsToMany
    {
        return $this->belongsToMany(Booking::class, 'booking_seats')
            ->withTimestamps();
    }

    /**
     * Get seat code (e.g., A1, B5)
     */
    public function getSeatCodeAttribute(): string
    {
        return $this->row_label . $this->seat_number;
    }

    /**
     * Check if seat is booked for a showtime
     */
    public function isBookedFor(int $showtimeId): bool
    {
        return $this->bookings()
            ->where('showtime_id', $showtimeId)
            ->whereIn('status', ['pending', 'paid'])
            ->exists();
    }
}
