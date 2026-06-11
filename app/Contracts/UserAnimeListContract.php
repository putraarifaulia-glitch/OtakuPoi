<?php

namespace App\Contracts;

/**
 * ==========================================
 * 3. CONTRACT UNTUK FITUR 2: PERSONAL ANIME LIST
 * ==========================================
 * Backend harus mengimplementasikan ini untuk fitur CRUD list tontonan user.
 */
interface UserAnimeListContract
{
    /**
     * Mengambil semua daftar anime milik user tertentu.
     */
    public function getUserList(int $userId): array;

    /**
     * Menambahkan anime baru ke dalam daftar pribadi user.
     * $animeData berisi array asosiatif: ['anime_id', 'title', 'image_url', 'status']
     */
    public function addToList(int $userId, array $animeData): array;

    /**
     * Memperbarui status tontonan (Watching, Completed, Plan to Watch) atau progress episode.
     */
    public function updateProgress(int $listId, string $status, ?int $progressEpisode = null): array;

    /**
     * Menghapus anime dari daftar pribadi user.
     */
    public function removeFromList(int $listId): bool;
}
