<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MangaResource;
use App\Repositories\MangaRepository;
use Illuminate\Http\Request;
use Exception;

class MangaController extends Controller
{
    public function __construct(protected MangaRepository $mangaRepository)
    {
    }

    public function index(Request $request)
    {
        try {
            $query = $request->query('q');
            $page = $request->query('page', 1);

            if ($query) {
                $response = $this->mangaRepository->search($query, $page);
            } else {
                $response = $this->mangaRepository->getTop($page);
            }

            return MangaResource::collection($response['data'])
                ->additional(['meta' => $response['pagination'] ?? []]);

        } catch (Exception $e) {
            return response()->json([
                'error' => 'Failed to retrieve manga data',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function show(int $id)
    {
        try {
            $response = $this->mangaRepository->findById($id);
            return new MangaResource($response['data']);
        } catch (Exception $e) {
            return response()->json([
                'error' => "Failed to retrieve manga with ID {$id}",
                'message' => $e->getMessage()
            ], 404);
        }
    }
}
