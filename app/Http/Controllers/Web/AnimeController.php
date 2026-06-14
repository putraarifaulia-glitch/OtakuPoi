<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\AnimeRepository;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    public function __construct(
        protected AnimeRepository $animeRepository
    ) {}

    public function index(Request $request)
    {
        $query = $request->query('q');
        $page = $request->query('page', 1);

        // Fetch slightly more to account for unique/filter, but limit to 18 for pagination consistency
        $response = $query 
            ? $this->animeRepository->search($query, null, $page, 'score', 'desc', 18)
            : $this->animeRepository->getTop($page, null, 18);

        $animes = collect($response['data'] ?? [])
            ->unique('mal_id')
            ->filter(fn($item) => !isset($item['status']) || !str_contains(strtolower($item['status']), 'upcoming'))
            ->take(18)
            ->values();

        return view('pages.anime.index', [
            'animes' => $animes,
            'pagination' => $response['pagination'] ?? [],
            'query' => $query
        ]);
    }

    public function byGenre($id)
    {
        $page = request()->query('page', 1);
        $response = $this->animeRepository->search(null, $id, $page, 'start_date', 'desc', 18);

        $animes = collect($response['data'] ?? [])
            ->unique('mal_id')
            ->filter(fn($item) => !isset($item['status']) || !str_contains(strtolower($item['status']), 'upcoming'))
            ->take(18)
            ->values();

        // Fetch genre name
        $genreResponse = \Illuminate\Support\Facades\Http::get('https://api.jikan.moe/v4/genres/anime')->json();
        $genreName = collect($genreResponse['data'] ?? [])->firstWhere('mal_id', (int)$id)['name'] ?? 'Anime Genre';

        return view('pages.anime.genre', [
            'animes' => $animes,
            'pagination' => $response['pagination'] ?? [],
            'genreName' => $genreName,
            'genreId' => $id
        ]);
    }

    public function show($id)
    {
        $response = $this->animeRepository->findById($id);
        $anime = $response['data'] ?? null;
        
        if (!$anime || empty($anime)) {
            abort(404);
        }
        
        $characters = $this->animeRepository->getCharacters($id)['data'] ?? [];
        
        $userListEntry = null;
        if (auth()->check()) {
            $userListEntry = \App\Models\AnimeList::where('user_id', auth()->id())
                ->where('anime_id', $id)
                ->first();
        }

        return view('pages.anime.show', [
            'anime' => $anime,
            'characters' => $characters,
            'userListEntry' => $userListEntry
        ]);
    }
}
