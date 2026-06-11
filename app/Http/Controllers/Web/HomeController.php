<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\AnimeRepository;
use App\Repositories\MangaRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(
        protected AnimeRepository $animeRepository,
        protected MangaRepository $mangaRepository
    ) {}

    public function welcome()
    {
        // For landing page, we can show top anime/manga
        $topAnime = $this->animeRepository->getTop(1);
        $topManga = $this->mangaRepository->getTop(1);

        return view('welcome', [
            'topAnime' => $topAnime['data'] ?? [],
            'topManga' => $topManga['data'] ?? [],
        ]);
    }

    public function index()
    {
        $topAnime = $this->animeRepository->getTop(1);
        $topManga = $this->mangaRepository->getTop(1);
        $topAiring = $this->animeRepository->getTop(1, 'airing');

        return view('pages.home', [
            'topAnime' => $topAnime['data'] ?? [],
            'topManga' => $topManga['data'] ?? [],
            'topAiring' => $topAiring['data'] ?? [],
        ]);
    }
}
