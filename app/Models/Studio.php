<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Studio extends Model
{
    use HasFactory;

    protected $fillable = [
        'cinema_id',
        'name',
        'type',
        'capacity',
        'rows',
        'seats_per_row',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the cinema that owns the studio.
     */
    public function cinema(): BelongsTo
    {
        return $this->belongsTo(Cinema::class);
    }

    /**
     * Get the seats for the studio.
     */
    public function seats(): HasMany
    {
        return $this->hasMany(Seat::class);
    }

    /**
     * Get the showtimes for the studio.
     */
    public function showtimes(): HasMany
    {
        return $this->hasMany(Showtime::class);
    }

    /**
     * Get type label
     */
    public function getTypeLabelAttribute(): string
    {
        return match($this->type) {
            'regular' => 'Regular',
            'imax' => 'IMAX',
            'premiere' => 'Premiere',
            '4dx' => '4DX',
            default => ucfirst($this->type),
        };
    }

    /**
     * Scope for active studios.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
