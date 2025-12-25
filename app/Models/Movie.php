<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'tmdb_id',
        'title',
        'synopsis',
        'poster',
        'backdrop',
        'duration',
        'rating',
        'genre',
        'release_date',
        'status',
    ];

    protected $casts = [
        'release_date' => 'date',
        'rating' => 'decimal:1',
    ];

    /**
     * Get the showtimes for the movie.
     */
    public function showtimes(): HasMany
    {
        return $this->hasMany(Showtime::class);
    }

    /**
     * Scope for now playing movies.
     */
    public function scopeNowPlaying($query)
    {
        return $query->where('status', 'now_playing');
    }

    /**
     * Scope for coming soon movies.
     */
    public function scopeComingSoon($query)
    {
        return $query->where('status', 'coming_soon');
    }

    /**
     * Get poster URL
     */
    public function getPosterUrlAttribute(): string
    {
        if ($this->poster && str_starts_with($this->poster, 'http')) {
            return $this->poster;
        }
        return $this->poster 
            ? asset('storage/' . $this->poster) 
            : asset('images/no-poster.svg');
    }

    /**
     * Get backdrop URL
     */
    public function getBackdropUrlAttribute(): string
    {
        if ($this->backdrop && str_starts_with($this->backdrop, 'http')) {
            return $this->backdrop;
        }
        return $this->backdrop 
            ? asset('storage/' . $this->backdrop) 
            : asset('images/no-backdrop.svg');
    }
}
