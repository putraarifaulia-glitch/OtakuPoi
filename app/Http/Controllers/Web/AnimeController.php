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

        $response = $query 
            ? $this->animeRepository->search($query, null, $page, 'score', 'desc', 25)
            : $this->animeRepository->getTop($page, null, 25);

        $animes = collect($response['data'] ?? [])
            ->unique('mal_id')
            ->filter(fn($item) => !isset($item['status']) || !str_contains(strtolower($item['status']), 'upcoming'))
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
        $response = $this->animeRepository->search(null, $id, $page, 'start_date', 'desc', 25);
        
        $animes = collect($response['data'] ?? [])
            ->unique('mal_id')
            ->filter(fn($item) => !isset($item['status']) || !str_contains(strtolower($item['status']), 'upcoming'))
            ->values();

        return view('pages.anime.genre', [
            'animes' => $animes,
            'pagination' => $response['pagination'] ?? [],
            'genreId' => $id
        ]);
    }
}
