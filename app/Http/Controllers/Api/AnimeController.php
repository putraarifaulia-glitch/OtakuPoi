<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AnimeResource;
use App\Repositories\AnimeRepository;
use Illuminate\Http\Request;
use Exception;

class AnimeController extends Controller
{
    public function __construct(protected AnimeRepository $animeRepository)
    {
    }

    public function index(Request $request)
    {
        try {
            $query = $request->query('q');
            $page = $request->query('page', 1);

            if ($query) {
                $response = $this->animeRepository->search($query, $page);
            } else {
                $response = $this->animeRepository->getTop($page);
            }

            return AnimeResource::collection($response['data'])
                ->additional(['meta' => $response['pagination'] ?? []]);

        } catch (Exception $e) {
            return response()->json([
                'error' => 'Failed to retrieve anime data',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function show(int $id)
    {
        try {
            $response = $this->animeRepository->findById($id);
            return new AnimeResource($response['data']);
        } catch (Exception $e) {
            return response()->json([
                'error' => "Failed to retrieve anime with ID {$id}",
                'message' => $e->getMessage()
            ], 404);
        }
    }
}
