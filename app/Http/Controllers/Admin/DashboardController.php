<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\News;
use App\Models\Comment;
use App\Models\AnimeList;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_users' => User::count(),
            'total_news' => News::count(),
            'total_comments' => Comment::count(),
            'total_watchlist_items' => AnimeList::count(),
        ];

        // Top 5 most favorited anime
        $popularAnime = AnimeList::select('anime_id', 'title', 'image_url', DB::raw('count(*) as total'))
            ->groupBy('anime_id', 'title', 'image_url')
            ->orderBy('total', 'desc')
            ->take(5)
            ->get();

        // Top 5 highest rated anime (avg score)
        $topRatedAnime = AnimeList::select('anime_id', 'title', 'image_url', DB::raw('avg(score) as avg_score'))
            ->whereNotNull('score')
            ->groupBy('anime_id', 'title', 'image_url')
            ->orderBy('avg_score', 'desc')
            ->take(5)
            ->get();

        // Recent users
        $recentUsers = User::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'popularAnime', 'topRatedAnime', 'recentUsers'));
    }
}
