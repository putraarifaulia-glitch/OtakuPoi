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
            $response = $this->mangaRepository->search($query, $page);
        } else {
            $response = $this->mangaRepository->getTop($page);
        }

        return view('pages.manga.index', [
            'mangas' => $response['data'] ?? [],
            'pagination' => $response['pagination'] ?? [],
            'query' => $query
        ]);
    }

    public function show($id)
    {
        $response = $this->mangaRepository->findById($id);
        $manga = $response['data'] ?? abort(404);
        
        return view('pages.manga.show', [
            'manga' => $manga
        ]);
    }
}
