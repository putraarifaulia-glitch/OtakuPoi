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
