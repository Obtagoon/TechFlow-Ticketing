<?php

namespace App\Services;

use App\Models\Movie;
use App\Models\Studio;
use App\Models\Showtime;

class ShowtimeGenerator
{
    /**
     * Default show times (4 sessions per day)
     */
    protected array $defaultTimes = ['12:30', '15:00', '17:30', '20:00'];

    /**
     * Prices per studio type
     */
    protected array $prices = [
        'regular' => 50000,
        'imax' => 100000,
        'premiere' => 150000,
        '4dx' => 120000,
    ];

    /**
     * Generate showtimes for a movie
     */
    public function generateForMovie(Movie $movie, int $days = 7): int
    {
        // Only generate for now_playing movies
        if ($movie->status !== 'now_playing') {
            return 0;
        }

        // Check if movie already has upcoming showtimes
        $existingShowtimes = Showtime::where('movie_id', $movie->id)
            ->where('show_date', '>=', today())
            ->count();

        if ($existingShowtimes > 0) {
            return 0; // Already has showtimes, skip
        }

        $studios = Studio::where('is_active', true)->get();
        $createdCount = 0;

        foreach ($studios as $studio) {
            for ($day = 0; $day < $days; $day++) {
                $date = now()->addDays($day)->format('Y-m-d');
                
                // For today, only add showtimes that haven't passed yet
                $availableTimes = $this->defaultTimes;
                if ($day === 0) {
                    $currentHour = (int) now()->format('H');
                    $availableTimes = array_filter($this->defaultTimes, function($time) use ($currentHour) {
                        return (int) substr($time, 0, 2) > $currentHour;
                    });
                }

                foreach ($availableTimes as $time) {
                    // Check if showtime already exists to prevent duplicates
                    $exists = Showtime::where('movie_id', $movie->id)
                        ->where('studio_id', $studio->id)
                        ->where('show_date', $date)
                        ->where('show_time', $time)
                        ->exists();

                    if (!$exists) {
                        Showtime::create([
                            'movie_id' => $movie->id,
                            'studio_id' => $studio->id,
                            'show_date' => $date,
                            'show_time' => $time,
                            'price' => $this->prices[$studio->type] ?? 50000,
                            'is_active' => true,
                        ]);
                        $createdCount++;
                    }
                }
            }
        }

        return $createdCount;
    }

    /**
     * Extend showtimes for a movie by additional days
     */
    public function extendShowtimes(Movie $movie, int $additionalDays = 7): int
    {
        if ($movie->status !== 'now_playing') {
            return 0;
        }

        // Find the last showtime date
        $lastShowtime = Showtime::where('movie_id', $movie->id)
            ->orderBy('show_date', 'desc')
            ->first();

        $startDate = $lastShowtime 
            ? $lastShowtime->show_date->addDay() 
            : today();

        $studios = Studio::where('is_active', true)->get();
        $createdCount = 0;

        foreach ($studios as $studio) {
            for ($day = 0; $day < $additionalDays; $day++) {
                $date = $startDate->copy()->addDays($day)->format('Y-m-d');

                foreach ($this->defaultTimes as $time) {
                    $exists = Showtime::where('movie_id', $movie->id)
                        ->where('studio_id', $studio->id)
                        ->where('show_date', $date)
                        ->where('show_time', $time)
                        ->exists();

                    if (!$exists) {
                        Showtime::create([
                            'movie_id' => $movie->id,
                            'studio_id' => $studio->id,
                            'show_date' => $date,
                            'show_time' => $time,
                            'price' => $this->prices[$studio->type] ?? 50000,
                            'is_active' => true,
                        ]);
                        $createdCount++;
                    }
                }
            }
        }

        return $createdCount;
    }
}
