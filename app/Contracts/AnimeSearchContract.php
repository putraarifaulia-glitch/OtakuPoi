<?php

namespace App\Contracts;

/**
 * ==========================================
 * 2. CONTRACT UNTUK FITUR 1: SEARCH ANIME
 * ==========================================
 * Backend harus mengimplementasikan ini di class yang menangani Jikan API (misal: JikanService)
 */
interface AnimeSearchContract
{
    /**
     * Mengambil data dari Jikan API berdasarkan keyword atau genre.
     * Harus me-return array hasil format ulang yang siap dipakai Frontend.
     */
    public function searchAnime(?string $keyword = null, ?string $genre = null, int $page = 1): array;
}
