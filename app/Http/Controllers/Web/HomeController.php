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
        // Use Caching for all Jikan API data to improve performance (TTL: 6 hours)
        $cacheTtl = 21600;

        $topAiringData = \Illuminate\Support\Facades\Cache::remember('home_top_airing', $cacheTtl, function () {
            return $this->animeRepository->getTop(1, 'airing', 25);
        });

        $upcomingData = \Illuminate\Support\Facades\Cache::remember('home_upcoming', $cacheTtl, function () {
            return $this->animeRepository->getTopUpcoming(1, 25);
        });

        $topCharactersData = \Illuminate\Support\Facades\Cache::remember('home_top_characters', $cacheTtl, function () {
            return $this->animeRepository->getTopCharacters(1, 25);
        });
        
        $seasonalPage1 = \Illuminate\Support\Facades\Cache::remember('home_seasonal_now', $cacheTtl, function () {
            return \Illuminate\Support\Facades\Http::get('https://api.jikan.moe/v4/seasons/now', ['page' => 1])->json()['data'] ?? [];
        });
        
        $latestEpisodes = \Illuminate\Support\Facades\Cache::remember('home_latest_episodes', $cacheTtl, function () {
            return \Illuminate\Support\Facades\Http::get('https://api.jikan.moe/v4/watch/episodes')->json()['data'] ?? [];
        });

        $topMangaPage1 = \Illuminate\Support\Facades\Cache::remember('home_top_manga', $cacheTtl, function () {
            return $this->mangaRepository->getTop(1);
        });

        // 1. Currently Airing / Seasonal (12 items)
        $seasonalAnime = collect($seasonalPage1)
            ->unique('mal_id')
            ->take(12)
            ->values();

        // 2. Top Airing Sidebar (8 anime, unique, score descending)
        $topAiringAnimes = collect($topAiringData['data'] ?? [])
            ->unique('mal_id')
            ->sortByDesc('score')
            ->take(8)
            ->map(fn($item) => (object)[
                'id' => $item['mal_id'],
                'title' => $item['title'],
                'poster_url' => $item['images']['jpg']['image_url'],
                'score' => $item['score']
            ]);

        // 3. Top Characters (5 unique main characters)
        $topCharacters = collect($topCharactersData['data'] ?? [])
            ->unique('mal_id')
            ->take(5)
            ->map(fn($item) => (object)[
                'id' => $item['mal_id'],
                'name' => $item['name'],
                'image_url' => $item['images']['jpg']['image_url'],
                'role' => 'Main'
            ]);

        // 4. Top Upcoming Sidebar (5 anime, unique)
        $upcomingAnimes = collect($upcomingData['data'] ?? [])
            ->unique('mal_id')
            ->take(5)
            ->map(fn($item) => (object)[
                'id' => $item['mal_id'],
                'title' => $item['title'],
                'poster_url' => $item['images']['jpg']['image_url']
            ]);

        // Other home data: Fetch 1 page for Manga to get 12
        $topManga = collect($topMangaPage1['data'] ?? [])
            ->unique('mal_id')
            ->take(12)
            ->values();

        $latestNews = \App\Models\News::latest()->take(5)->get();

        return view('pages.home', [
            'topManga' => $topManga,
            'seasonalAnime' => $seasonalAnime,
            'latestEpisodes' => $latestEpisodes,
            'topAiringAnimes' => $topAiringAnimes,
            'topCharacters' => $topCharacters,
            'upcomingAnimes' => $upcomingAnimes,
            'latestNews' => $latestNews,
        ]);
    }

    public function index()
    {
        return $this->welcome();
    }

    public function news()
    {
        $news = \App\Models\News::latest()->get();
        return view('pages.news.index', compact('news'));
    }

    public function showNews($slug)
    {
        $news = \App\Models\News::where('slug', $slug)->firstOrFail();
        return view('pages.news.show', compact('news'));
    }
}
