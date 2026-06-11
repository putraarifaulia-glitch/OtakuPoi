<?php

namespace App\Services;

use App\Contracts\AuthContract;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthService implements AuthContract
{
    /**
     * Mendaftarkan user baru ke database.
     */
    public function register(string $username, string $email, string $password): array
    {
        $user = User::create([
            'name' => $username,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'success' => true,
            'message' => 'User registered successfully',
            'data' => [
                'user' => $user,
                'token' => $token
            ]
        ];
    }

    /**
     * Memvalidasi login user.
     */
    public function login(string $email, string $password): array
    {
        if (!Auth::attempt(['email' => $email, 'password' => $password])) {
            return [
                'success' => false,
                'message' => 'Invalid login credentials',
            ];
        }

        $user = User::where('email', $email)->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'success' => true,
            'message' => 'Login successful',
            'data' => [
                'user' => $user,
                'token' => $token
            ]
        ];
    }
}
