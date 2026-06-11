<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AnimeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // Jikan v4 response usually wraps the data in a 'data' key
        $data = $this->resource['data'] ?? $this->resource;

        return [
            'id' => $data['mal_id'] ?? null,
            'title' => $data['title'] ?? null,
            'title_english' => $data['title_english'] ?? null,
            'title_japanese' => $data['title_japanese'] ?? null,
            'image_url' => $data['images']['jpg']['large_image_url'] ?? null,
            'type' => $data['type'] ?? null,
            'episodes' => $data['episodes'] ?? null,
            'status' => $data['status'] ?? null,
            'score' => $data['score'] ?? null,
            'synopsis' => $data['synopsis'] ?? null,
            'year' => $data['year'] ?? null,
            'genres' => collect($data['genres'] ?? [])->map(fn($genre) => $genre['name']),
            'url' => $data['url'] ?? null,
        ];
    }
}
