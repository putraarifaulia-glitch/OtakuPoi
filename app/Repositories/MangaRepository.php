<?php

namespace App\Repositories;

use App\Services\JikanApiService;

class MangaRepository
{
    public function __construct(protected JikanApiService $jikanService)
    {
    }

    public function getTop(int $page = 1)
    {
        return $this->jikanService->getTopManga($page);
    }

    public function search(string $query, int $page = 1)
    {
        return $this->jikanService->searchManga([
            'q' => $query,
            'page' => $page
        ]);
    }

    public function findById(int $id)
    {
        return $this->jikanService->getMangaById($id);
    }
}
