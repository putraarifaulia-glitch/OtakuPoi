<?php

namespace App\Services;

use App\Contracts\UserAnimeListContract;
use App\Models\AnimeList;
use Illuminate\Support\Facades\Auth;

class UserAnimeListService implements UserAnimeListContract
{
    /**
     * Mengambil semua daftar anime milik user tertentu.
     */
    public function getUserList(int $userId): array
    {
        return AnimeList::where('user_id', $userId)->get()->toArray();
    }

    /**
     * Menambahkan anime baru ke dalam daftar pribadi user.
     */
    public function addToList(int $userId, array $animeData): array
    {
        $animeList = AnimeList::updateOrCreate(
            ['user_id' => $userId, 'anime_id' => $animeData['anime_id']],
            [
                'title' => $animeData['title'],
                'image_url' => $animeData['image_url'],
                'status' => $animeData['status'] ?? 'Plan to Watch',
                'translations' => $animeData['translations'] ?? null,
            ]
        );

        return [
            'success' => true,
            'message' => 'Anime successfully added to your list.',
            'data' => $animeList->toArray()
        ];
    }

    /**
     * Memperbarui status tontonan atau progress episode.
     */
    public function updateProgress(int $listId, string $status, ?int $progressEpisode = null): array
    {
        $animeList = AnimeList::findOrFail($listId);
        $animeList->status = $status;
        if ($progressEpisode !== null) {
            $animeList->progress_episode = $progressEpisode;
        }
        $animeList->save();

        return [
            'success' => true,
            'message' => 'Your progress has been updated.',
            'data' => $animeList->toArray()
        ];
    }

    /**
     * Menghapus anime dari daftar pribadi user.
     */
    public function removeFromList(int $listId): bool
    {
        $animeList = AnimeList::findOrFail($listId);
        return $animeList->delete();
    }
}
