<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\MangaRepository;
use Illuminate\Http\Request;

class MangaController extends Controller
{
    public function __construct(
        protected MangaRepository $mangaRepository
    ) {}

    public function index(Request $request)
    {
        $query = $request->query('q');
        $genre = $request->query('genre');
        $type = $request->query('type');
        $status = $request->query('status');
        $minScore = $request->query('min_score');
        $year = $request->query('year');
        $page = $request->query('page', 1);

        $additionalParams = [];
        if ($genre) $additionalParams['genres'] = $genre;
        if ($type) $additionalParams['type'] = $type;
        if ($status) $additionalParams['status'] = $status;
        if ($minScore) $additionalParams['min_score'] = $minScore;
        if ($year) {
            $additionalParams['start_date'] = $year . '-01-01';
            $additionalParams['end_date'] = $year . '-12-31';
        }

        if ($query || $genre || $type || $status || $minScore || $year) {
            $response = $this->mangaRepository->search($query ?? '', $page, 18, $additionalParams);
        } else {
            $response = $this->mangaRepository->getTop($page, 18);
        }

        // Fetch genres for filter
        $genres = \Illuminate\Support\Facades\Cache::remember('manga_genres_list', 86400, function() {
            $res = \Illuminate\Support\Facades\Http::get('https://api.jikan.moe/v4/genres/manga')->json();
            return collect($res['data'] ?? [])
                ->filter(fn($g) => !in_array(strtolower($g['name']), ['hentai', 'erotica']))
                ->sortBy('name')
                ->values();
        });

        return view('pages.manga.index', [
            'mangas' => collect($response['data'] ?? [])->take(18)->values(),
            'pagination' => $response['pagination'] ?? [],
            'query' => $query,
            'genres' => $genres,
            'selectedGenre' => $genre,
            'selectedType' => $type,
            'selectedStatus' => $status,
            'selectedMinScore' => $minScore,
            'selectedYear' => $year
        ]);
    }

    public function show($id)
    {
        $response = $this->mangaRepository->findById($id);
        $manga = $response['data'] ?? null;
        
        if (!$manga || empty($manga)) {
            abort(404);
        }
        
        return view('pages.manga.show', [
            'manga' => $manga
        ]);
    }

    public function byGenre($id, Request $request)
    {
        $page = $request->query('page', 1);
        
        // Fetch manga for genre
        $response = $this->mangaRepository->searchByGenre($id, $page, 18);
        
        // Fetch genre name
        $genreResponse = \Illuminate\Support\Facades\Http::get('https://api.jikan.moe/v4/genres/manga')->json();
        $genreName = collect($genreResponse['data'] ?? [])->firstWhere('mal_id', (int)$id)['name'] ?? 'Manga Genre';

        return view('pages.manga.genre', [
            'mangas' => collect($response['data'] ?? [])->take(18)->values(),
            'pagination' => $response['pagination'] ?? [],
            'genreName' => $genreName,
            'genreId' => $id
        ]);
    }
}
