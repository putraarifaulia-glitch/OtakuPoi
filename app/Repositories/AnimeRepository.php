<?php

namespace App\Repositories;

use App\Services\JikanApiService;

class AnimeRepository
{
    public function __construct(protected JikanApiService $jikanService)
    {
    }

    public function getTop(int $page = 1)
    {
        return $this->jikanService->getTopAnime($page);
    }

    public function search(string $query, int $page = 1)
    {
        return $this->jikanService->searchAnime([
            'q' => $query,
            'page' => $page
        ]);
    }

    public function findById(int $id)
    {
        return $this->jikanService->getAnimeById($id);
    }
}
