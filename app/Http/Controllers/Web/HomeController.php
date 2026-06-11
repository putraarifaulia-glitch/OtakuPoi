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
        $topAnime = $this->animeRepository->getTop(1);
        $topManga = $this->mangaRepository->getTop(1);
        $topAiring = $this->animeRepository->getTop(1, 'airing');
        
        $seasonalAnime = \Illuminate\Support\Facades\Http::get('https://api.jikan.moe/v4/seasons/now')->json()['data'] ?? [];
        $latestEpisodes = \Illuminate\Support\Facades\Http::get('https://api.jikan.moe/v4/watch/episodes')->json()['data'] ?? [];

        return view('pages.home', [
            'topAnime' => $topAnime['data'] ?? [],
            'topManga' => $topManga['data'] ?? [],
            'topAiring' => $topAiring['data'] ?? [],
            'seasonalAnime' => $seasonalAnime,
            'latestEpisodes' => $latestEpisodes,
        ]);
    }

    public function index()
    {
        $topAnime = $this->animeRepository->getTop(1);
        $topManga = $this->mangaRepository->getTop(1);
        $topAiring = $this->animeRepository->getTop(1, 'airing');
        
        // Fetch data seasonal dan latest episodes
        $seasonalAnime = \Illuminate\Support\Facades\Http::get('https://api.jikan.moe/v4/seasons/now')->json()['data'] ?? [];
        $latestEpisodes = \Illuminate\Support\Facades\Http::get('https://api.jikan.moe/v4/watch/episodes')->json()['data'] ?? [];

        return view('pages.home', [
            'topAnime' => $topAnime['data'] ?? [],
            'topManga' => $topManga['data'] ?? [],
            'topAiring' => $topAiring['data'] ?? [],
            'seasonalAnime' => $seasonalAnime,
            'latestEpisodes' => $latestEpisodes,
        ]);
    }
}
