<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Exception;

use App\Contracts\AnimeSearchContract;

class JikanApiService implements AnimeSearchContract
{
    /**
     * The base URL for the Jikan API.
     */
    protected string $baseUrl = 'https://api.jikan.moe/v4';

    /**
     * Fetch data from the Jikan API with caching.
     *
     * @param string $endpoint
     * @param array $query
     * @param int $ttl Seconds to cache (default 6 hours)
     * @return array
     * @throws Exception
     */
    public function fetch(string $endpoint, array $query = [], int $ttl = 21600): array
    {
        $cacheKey = 'jikan_' . md5($endpoint . serialize($query));

        try {
            return Cache::remember($cacheKey, $ttl, function () use ($endpoint, $query) {
                // Respect Jikan rate limiting: 3 requests per second
                // In a production environment, we might use a more sophisticated rate limiter
                // but for now, we'll just handle the response.
                
                $response = Http::withHeaders([
                    'Accept' => 'application/json',
                ])->get("{$this->baseUrl}/{$endpoint}", $query);

                if ($response->status() === 429) {
                    Log::warning("Jikan API Rate Limited", ['endpoint' => $endpoint]);
                    throw new \Exception("Rate limit exceeded. Please try again later.", 429);
                }

                if ($response->failed()) {
                    Log::error("Jikan API Error", [
                        'endpoint' => $endpoint,
                        'status' => $response->status(),
                        'body' => $response->body()
                    ]);
                    throw new \Exception("Failed to fetch data from Jikan API.", $response->status());
                }

                return $response->json();
            });
        } catch (\Exception $e) {
            Log::error("JikanApiService Exception: " . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Search for anime.
     */
    public function searchAnime(?string $keyword = null, ?string $genre = null, int $page = 1, string $orderBy = 'score', string $sort = 'desc', int $limit = 25): array
    {
        $params = [
            'page' => $page,
            'limit' => $limit,
            'order_by' => $orderBy,
            'sort' => $sort,
            'sfw' => true // Memblokir konten NSFW/Hentai
        ];
        if ($keyword) {
            $params['q'] = $keyword;
        }
        if ($genre) {
            $params['genres'] = $genre;
        }

        return $this->fetch('anime', $params);
    }

    /**
     * Get top anime.
     */
    public function getTopAnime(int $page = 1, ?string $filter = null, int $limit = 25): array
    {
        $params = ['page' => $page, 'limit' => $limit];
        if ($filter) {
            $params['filter'] = $filter;
        }
        return $this->fetch('top/anime', $params);
    }

    /**
     * Get upcoming anime.
     */
    public function getUpcomingAnime(int $page = 1, int $limit = 25): array
    {
        return $this->fetch('top/anime', ['page' => $page, 'filter' => 'upcoming', 'limit' => $limit]);
    }

    /**
     * Get top characters.
     */
    public function getTopCharacters(int $page = 1, int $limit = 25): array
    {
        return $this->fetch('top/characters', ['page' => $page, 'limit' => $limit]);
    }

    /**
     * Get anime by ID.
     */
    public function getAnimeById(int $id): array
    {
        return $this->fetch("anime/{$id}/full");
    }

    /**
     * Search for manga.
     */
    public function searchManga(array $params): array
    {
        return $this->fetch('manga', $params);
    }

    /**
     * Get top manga.
     */
    public function getTopManga(int $page = 1): array
    {
        return $this->fetch('top/manga', ['page' => $page]);
    }

    /**
     * Get manga by ID.
     */
    public function getMangaById(int $id): array
    {
        return $this->fetch("manga/{$id}/full");
    }
}
