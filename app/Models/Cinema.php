<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cinema extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'city',
        'phone',
        'image',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the studios for the cinema.
     */
    public function studios(): HasMany
    {
        return $this->hasMany(Studio::class);
    }

    /**
     * Get image URL
     */
    public function getImageUrlAttribute(): string
    {
        return $this->image 
            ? asset('storage/' . $this->image) 
            : asset('images/no-cinema.svg');
    }

    /**
     * Scope for active cinemas.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
