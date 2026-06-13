<?php

namespace App\Repositories;

use App\Services\JikanApiService;

class AnimeRepository
{
    public function __construct(
        protected JikanApiService $jikanService
    ) {
    }

    public function getTop(int $page = 1, ?string $filter = null, int $limit = 25)
    {
        return $this->jikanService->getTopAnime($page, $filter, $limit);
    }

    public function getTopUpcoming(int $page = 1, int $limit = 25)
    {
        return $this->jikanService->getUpcomingAnime($page, $limit);
    }

    public function getTopCharacters(int $page = 1, int $limit = 25)
    {
        return $this->jikanService->getTopCharacters($page, $limit);
    }

    public function search(?string $query, ?string $genre, int $page = 1, string $orderBy = 'score', string $sort = 'desc', int $limit = 25)
    {
        return $this->jikanService->searchAnime($query, $genre, $page, $orderBy, $sort, $limit);
    }

    public function getCharacters(int $id)
    {
        return $this->jikanService->fetch("anime/{$id}/characters");
    }

    public function findById(int $id)
    {
        $cacheKey = "anime_detail_{$id}";

        return \Illuminate\Support\Facades\Cache::remember($cacheKey, 3600, function () use ($id) {
            return $this->jikanService->getAnimeById($id);
        });
    }
}
