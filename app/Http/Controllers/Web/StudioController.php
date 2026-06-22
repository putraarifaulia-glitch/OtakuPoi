<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\JikanApiService;
use Illuminate\Http\Request;

class StudioController extends Controller
{
    public function __construct(protected JikanApiService $jikanService) {}
public function index(Request $request)
{
    $page = $request->query('page', 1);
    $response = $this->jikanService->getStudios($page, 25);

    \Illuminate\Support\Facades\Log::info('Studio Debug Data', ['sample' => $response['data'][0] ?? 'No Data']);

    return view('pages.studio.index', [
        'studios' => $response['data'] ?? [],
        'pagination' => $response['pagination'] ?? []
    ]);
}

    public function show($id, Request $request)
    {
        $page = $request->query('page', 1);
        
        // Fetch anime for studio sorted by start_date descending (newest first)
        $animeResponse = $this->jikanService->fetch("anime", [
            'producers' => $id, 'limit' => 25, 
            'page' => $page, 
            'limit' => 25,
            'order_by' => 'start_date',
            'sort' => 'desc'
        ]);
        
        // Fetch studio details to get the name
        $studioResponse = $this->jikanService->fetch("producers/{$id}");
        $studioName = $studioResponse['data']['titles'][0]['title'] ?? 'Studio';
        
        return view('pages.studio.show', [
            'animes' => collect($animeResponse['data'] ?? [])->take(25)->values(),
            'pagination' => $animeResponse['pagination'] ?? [],
            'studioId' => $id,
            'studioName' => $studioName
        ]);
    }
}
