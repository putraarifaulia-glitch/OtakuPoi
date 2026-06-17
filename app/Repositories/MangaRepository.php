<?php

namespace App\Repositories;

use App\Services\JikanApiService;

class MangaRepository
{
    public function __construct(protected JikanApiService $jikanService)
    {
    }

    public function search(string $keyword, int $page = 1, int $limit = 25, array $additionalParams = [])
    {
        return $this->jikanService->searchManga(array_merge([
            'q' => $keyword,
            'page' => $page,
            'limit' => $limit,
            'sfw' => true
        ], $additionalParams));
    }

    public function getTop(int $page = 1, int $limit = 25)
    {
        return $this->jikanService->getTopManga($page, $limit);
    }

    public function searchByGenre(int $genreId, int $page = 1, int $limit = 25)
    {
        return $this->jikanService->searchManga([
            'genres' => $genreId,
            'page' => $page,
            'limit' => $limit,
            'order_by' => 'score',
            'sort' => 'desc',
            'sfw' => true
        ]);
    }

    public function findById(int $id)
    {
        return $this->jikanService->getMangaById($id);
    }
}
