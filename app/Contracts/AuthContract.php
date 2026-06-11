<?php

namespace App\Contracts;

/**
 * ==========================================
 * 1. CONTRACT UNTUK FITUR 3: AUTHENTICATION
 * ==========================================
 * Backend harus mengimplementasikan ini di AuthService atau AuthController
 */
interface AuthContract
{
    /**
     * Mendaftarkan user baru ke database.
     * Harus me-return array berisi status success, message, dan data user/token.
     */
    public function register(string $username, string $email, string $password): array;

    /**
     * Memvalidasi login user.
     * Harus me-return array berisi status success, message, dan data user/token.
     */
    public function login(string $email, string $password): array;
}


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