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
        $page = $request->query('page', 1);

        if ($query) {
            $response = $this->mangaRepository->search($query, $page, 18);
        } else {
            $response = $this->mangaRepository->getTop($page, 18);
        }

        return view('pages.manga.index', [
            'mangas' => collect($response['data'] ?? [])->take(18)->values(),
            'pagination' => $response['pagination'] ?? [],
            'query' => $query
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
