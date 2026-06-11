<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\AnimeRepository;
use App\Services\TranslationService;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    public function __construct(
        protected AnimeRepository $animeRepository,
        protected TranslationService $translationService
    ) {}

    public function index(Request $request)
    {
        $query = $request->query('q');
        $page = $request->query('page', 1);

        if ($query) {
            $response = $this->animeRepository->search($query, $page);
        } else {
            $response = $this->animeRepository->getTop($page);
        }

        return view('pages.anime.index', [
            'animes' => $response['data'] ?? [],
            'pagination' => $response['pagination'] ?? [],
            'query' => $query
        ]);
    }

    public function show($id)
    {
        $response = $this->animeRepository->findById($id);
        $anime = $response['data'] ?? abort(404);
        
        // Translate synopsis
        if (isset($anime['synopsis'])) {
            $anime['synopsis'] = $this->translationService->translate($anime['synopsis']);
        }
        
        return view('pages.anime.show', [
            'anime' => $anime
        ]);
    }
}
