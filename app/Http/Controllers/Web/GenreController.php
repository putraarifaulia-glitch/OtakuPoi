<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class GenreController extends Controller
{
    public function index(): View
    {
        $animeResponse = \Illuminate\Support\Facades\Http::get('https://api.jikan.moe/v4/genres/anime')->json();
        $animeGenres = collect($animeResponse['data'] ?? [])
            ->filter(fn($genre) => !in_array(strtolower($genre['name']), ['hentai', 'erotica']))
            ->unique('name')
            ->sortBy('name');

        $mangaResponse = \Illuminate\Support\Facades\Http::get('https://api.jikan.moe/v4/genres/manga')->json();
        $mangaGenres = collect($mangaResponse['data'] ?? [])
            ->filter(fn($genre) => !in_array(strtolower($genre['name']), ['hentai', 'erotica']))
            ->unique('name')
            ->sortBy('name');

        return view('pages.genre.index', compact('animeGenres', 'mangaGenres'));
    }
}
