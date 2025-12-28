<?php

namespace App\Console\Commands;

use App\Models\Movie;
use App\Services\TmdbService;
use Illuminate\Console\Command;

class ImportTmdbMovies extends Command
{
    protected $signature = 'tmdb:import {--now-playing : Import now playing movies} {--upcoming : Import upcoming movies} {--limit=10 : Limit number of movies to import}';
    protected $description = 'Import movies from TMDB API';

    protected TmdbService $tmdb;

    public function __construct(TmdbService $tmdb)
    {
        parent::__construct();
        $this->tmdb = $tmdb;
    }

    public function handle(): int
    {
        $limit = (int) $this->option('limit');
        $importNowPlaying = $this->option('now-playing');
        $importUpcoming = $this->option('upcoming');

        // Default to both if none specified
        if (!$importNowPlaying && !$importUpcoming) {
            $importNowPlaying = true;
            $importUpcoming = true;
        }

        $imported = 0;
        $skipped = 0;

        if ($importNowPlaying) {
            $this->info('Fetching now playing movies from TMDB...');
            $result = $this->importFromList($this->tmdb->getNowPlaying(), 'now_playing', $limit);
            $imported += $result['imported'];
            $skipped += $result['skipped'];
        }

        if ($importUpcoming) {
            $this->info('Fetching upcoming movies from TMDB...');
            $result = $this->importFromList($this->tmdb->getUpcoming(), 'coming_soon', $limit);
            $imported += $result['imported'];
            $skipped += $result['skipped'];
        }

        $this->newLine();
        $this->info("✓ Import complete! Imported: {$imported}, Skipped (already exists): {$skipped}");

        return Command::SUCCESS;
    }

    protected function importFromList(array $response, string $status, int $limit): array
    {
        $imported = 0;
        $skipped = 0;

        if (isset($response['error'])) {
            $this->error('API Error: ' . $response['error']);
            return ['imported' => 0, 'skipped' => 0];
        }

        $movies = collect($response['results'] ?? [])->take($limit);

        foreach ($movies as $tmdbMovie) {
            // Skip if already exists
            if (Movie::where('tmdb_id', $tmdbMovie['id'])->exists()) {
                $this->line("  ⊘ Skipped: {$tmdbMovie['title']} (already exists)");
                $skipped++;
                continue;
            }

            // Get full movie details for runtime
            $details = $this->tmdb->getMovie($tmdbMovie['id']);
            if ($details && !isset($details['error'])) {
                $tmdbMovie = array_merge($tmdbMovie, $details);
            }

            // Transform and create
            $movieData = $this->tmdb->transformMovie($tmdbMovie);
            $movieData['status'] = $status;

            Movie::create($movieData);
            $this->info("  ✓ Imported: {$tmdbMovie['title']}");
            $imported++;
        }

        return ['imported' => $imported, 'skipped' => $skipped];
    }
}
