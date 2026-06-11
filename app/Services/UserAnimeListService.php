<?php

namespace App\Services;

use App\Contracts\UserAnimeListContract;

class UserAnimeListService implements UserAnimeListContract
{
    /**
     * Mengambil semua daftar anime milik user tertentu.
     */
    public function getUserList(int $userId): array
    {
        // TODO: Implement database logic
        return [];
    }

    /**
     * Menambahkan anime baru ke dalam daftar pribadi user.
     */
    public function addToList(int $userId, array $animeData): array
    {
        // TODO: Implement database logic
        return [
            'success' => true,
            'message' => 'Anime added to list',
            'data' => $animeData
        ];
    }

    /**
     * Memperbarui status tontonan atau progress episode.
     */
    public function updateProgress(int $listId, string $status, ?int $progressEpisode = null): array
    {
        // TODO: Implement database logic
        return [
            'success' => true,
            'message' => 'Progress updated'
        ];
    }

    /**
     * Menghapus anime dari daftar pribadi user.
     */
    public function removeFromList(int $listId): bool
    {
        // TODO: Implement database logic
        return true;
    }
}
