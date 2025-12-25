<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class TmdbService
{
    protected string $baseUrl = 'https://api.themoviedb.org/3';
    protected string $imageBaseUrl = 'https://image.tmdb.org/t/p';
    protected ?string $apiKey;

    public function __construct()
    {
        $this->apiKey = config('services.tmdb.api_key');
    }

    /**
     * Get now playing movies
     */
    public function getNowPlaying(int $page = 1): array
    {
        return $this->get('/movie/now_playing', [
            'page' => $page,
            'region' => 'ID',
            'language' => 'id-ID',
        ]);
    }

    /**
     * Get upcoming movies
     */
    public function getUpcoming(int $page = 1): array
    {
        return $this->get('/movie/upcoming', [
            'page' => $page,
            'region' => 'ID',
            'language' => 'id-ID',
        ]);
    }

    /**
     * Get popular movies
     */
    public function getPopular(int $page = 1): array
    {
        return $this->get('/movie/popular', [
            'page' => $page,
            'region' => 'ID',
            'language' => 'id-ID',
        ]);
    }

    /**
     * Get movie details
     */
    public function getMovie(int $tmdbId): ?array
    {
        $cacheKey = "tmdb_movie_{$tmdbId}";
        
        return Cache::remember($cacheKey, 3600, function () use ($tmdbId) {
            $movie = $this->get("/movie/{$tmdbId}", [
                'language' => 'id-ID',
                'append_to_response' => 'videos,credits',
            ]);
            
            return $movie['success'] ?? true ? $movie : null;
        });
    }

    /**
     * Search movies
     */
    public function searchMovies(string $query, int $page = 1): array
    {
        return $this->get('/search/movie', [
            'query' => $query,
            'page' => $page,
            'language' => 'id-ID',
            'region' => 'ID',
        ]);
    }

    /**
     * Get poster URL
     */
    public function getPosterUrl(?string $path, string $size = 'w500'): string
    {
        if (!$path) {
            return asset('images/no-poster.svg');
        }
        return "{$this->imageBaseUrl}/{$size}{$path}";
    }

    /**
     * Get backdrop URL
     */
    public function getBackdropUrl(?string $path, string $size = 'w1280'): string
    {
        if (!$path) {
            return asset('images/no-backdrop.svg');
        }
        return "{$this->imageBaseUrl}/{$size}{$path}";
    }

    /**
     * Get genre names from IDs
     */
    public function getGenres(): array
    {
        $cacheKey = 'tmdb_genres';
        
        return Cache::remember($cacheKey, 86400, function () {
            $response = $this->get('/genre/movie/list', ['language' => 'id-ID']);
            return $response['genres'] ?? [];
        });
    }

    /**
     * Make API request
     */
    protected function get(string $endpoint, array $params = []): array
    {
        if (!$this->apiKey) {
            return ['error' => 'TMDB API key not configured'];
        }

        try {
            $response = Http::timeout(10)
                ->get($this->baseUrl . $endpoint, array_merge($params, [
                    'api_key' => $this->apiKey,
                ]));

            if ($response->successful()) {
                return $response->json();
            }

            return ['error' => 'API request failed', 'status' => $response->status()];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    /**
     * Transform TMDB movie to local format
     */
    public function transformMovie(array $tmdbMovie): array
    {
        $genres = collect($tmdbMovie['genres'] ?? $tmdbMovie['genre_ids'] ?? [])
            ->map(fn($g) => is_array($g) ? $g['name'] : $this->getGenreName($g))
            ->filter()
            ->implode(', ');

        return [
            'tmdb_id' => $tmdbMovie['id'],
            'title' => $tmdbMovie['title'],
            'synopsis' => $tmdbMovie['overview'] ?? null,
            'poster' => $this->getPosterUrl($tmdbMovie['poster_path'] ?? null),
            'backdrop' => $this->getBackdropUrl($tmdbMovie['backdrop_path'] ?? null),
            'duration' => $tmdbMovie['runtime'] ?? 120,
            'rating' => $tmdbMovie['vote_average'] ?? 0,
            'genre' => $genres,
            'release_date' => $tmdbMovie['release_date'] ?? null,
        ];
    }

    /**
     * Get genre name by ID
     */
    protected function getGenreName(int $id): ?string
    {
        $genres = $this->getGenres();
        $genre = collect($genres)->firstWhere('id', $id);
        return $genre['name'] ?? null;
    }
}
