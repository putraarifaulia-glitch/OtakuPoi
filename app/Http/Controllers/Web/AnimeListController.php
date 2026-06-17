<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Contracts\UserAnimeListContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnimeListController extends Controller
{
    public function __construct(
        protected UserAnimeListContract $animeListService
    ) {}

    public function index()
    {
        $animeList = Auth::user()->animeLists()->orderBy('updated_at', 'desc')->get();

        return view('pages.anime-list.index', compact('animeList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'anime_id' => 'required|integer',
            'title' => 'required|string',
            'image_url' => 'required|string',
            'status' => 'required|in:Watching,Completed,On Hold,Dropped,Plan to Watch',
        ]);

        $result = $this->animeListService->addToList(Auth::id(), [
            'anime_id' => $request->anime_id,
            'title' => $request->title,
            'image_url' => $request->image_url,
            'status' => $request->status,
        ]);

        return back()->with('success', $result['message']);
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'status' => 'required|in:Watching,Completed,On Hold,Dropped,Plan to Watch',
            'progress_episode' => 'nullable|integer|min:0',
            'score' => 'nullable|integer|min:1|max:10',
        ]);

        $result = $this->animeListService->updateProgress(
            $id, 
            $request->status, 
            $request->progress_episode,
            $request->score
        );

        return back()->with('success', $result['message']);
    }

    public function destroy(int $id)
    {
        $this->animeListService->removeFromList($id);

        return back()->with('success', 'Anime removed from your list.');
    }
}
