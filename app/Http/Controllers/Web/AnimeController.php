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
        $genre = $request->query('genre');
        $page = $request->query('page', 1);

        if ($query || $genre) {
            $response = $this->animeRepository->search($query, $genre, $page);
        } else {
            $response = $this->animeRepository->getTop($page);
        }

        return view('pages.anime.index', [
            'animes' => $response['data'] ?? [],
            'pagination' => $response['pagination'] ?? [],
            'query' => $query,
            'genre' => $genre
        ]);
    }

    public function show($id)
    {
        $response = $this->animeRepository->findById($id);
        $anime = $response['data'] ?? abort(404);
        
        $charResponse = $this->animeRepository->getCharacters($id);
        $characters = $charResponse['data'] ?? [];
        
        return view('pages.anime.show', [
            'anime' => $anime,
            'characters' => $characters
        ]);
    }
}
