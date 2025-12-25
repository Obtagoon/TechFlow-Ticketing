<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'showtime_id',
        'booking_code',
        'total_seats',
        'total_price',
        'status',
        'payment_method',
        'payment_proof',
        'payment_notes',
        'admin_notes',
        'paid_at',
        'expires_at',
    ];

    protected $casts = [
        'total_price' => 'decimal:2',
        'paid_at' => 'datetime',
        'expires_at' => 'datetime',
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($booking) {
            if (!$booking->booking_code) {
                $booking->booking_code = self::generateBookingCode();
            }
            if (!$booking->expires_at) {
                $booking->expires_at = now()->addMinutes(10);
            }
        });
    }

    /**
     * Generate unique booking code
     */
    public static function generateBookingCode(): string
    {
        do {
            $code = 'TF' . strtoupper(Str::random(8));
        } while (self::where('booking_code', $code)->exists());
        
        return $code;
    }

    /**
     * Get the user that owns the booking.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the showtime for the booking.
     */
    public function showtime(): BelongsTo
    {
        return $this->belongsTo(Showtime::class);
    }

    /**
     * Get the seats for the booking.
     */
    public function seats(): BelongsToMany
    {
        return $this->belongsToMany(Seat::class, 'booking_seats')
            ->withTimestamps();
    }

    /**
     * Get formatted price
     */
    public function getFormattedPriceAttribute(): string
    {
        return 'Rp ' . number_format($this->total_price, 0, ',', '.');
    }

    /**
     * Get seat codes as string
     */
    public function getSeatCodesAttribute(): string
    {
        return $this->seats->map(fn($s) => $s->seat_code)->sort()->implode(', ');
    }

    /**
     * Get status label with color
     */
    public function getStatusLabelAttribute(): array
    {
        return match($this->status) {
            'pending' => ['label' => 'Menunggu Pembayaran', 'color' => 'yellow'],
            'waiting_confirmation' => ['label' => 'Menunggu Verifikasi', 'color' => 'blue'],
            'paid' => ['label' => 'Lunas', 'color' => 'green'],
            'cancelled' => ['label' => 'Dibatalkan', 'color' => 'red'],
            'rejected' => ['label' => 'Ditolak', 'color' => 'red'],
            'expired' => ['label' => 'Kadaluarsa', 'color' => 'gray'],
            default => ['label' => ucfirst($this->status), 'color' => 'gray'],
        };
    }

    /**
     * Get payment proof URL
     */
    public function getPaymentProofUrlAttribute(): ?string
    {
        if (!$this->payment_proof) {
            return null;
        }
        return asset('storage/' . $this->payment_proof);
    }

    /**
     * Check if booking is expired
     */
    public function isExpired(): bool
    {
        return $this->status === 'pending' && 
               $this->expires_at && 
               $this->expires_at->isPast();
    }

    /**
     * Mark as paid
     */
    public function markAsPaid(string $paymentMethod): void
    {
        $this->update([
            'status' => 'paid',
            'payment_method' => $paymentMethod,
            'paid_at' => now(),
        ]);
    }

    /**
     * Cancel booking
     */
    public function cancel(): void
    {
        $this->update(['status' => 'cancelled']);
    }

    /**
     * Scope for user's bookings
     */
    public function scopeForUser($query, int $userId)
    {
        return $query->where('user_id', $userId);
    }

    /**
     * Scope for active bookings (not cancelled/expired)
     */
    public function scopeActive($query)
    {
        return $query->whereIn('status', ['pending', 'waiting_confirmation', 'paid']);
    }

    /**
     * Scope for bookings waiting for admin confirmation
     */
    public function scopeWaitingConfirmation($query)
    {
        return $query->where('status', 'waiting_confirmation');
    }
}
