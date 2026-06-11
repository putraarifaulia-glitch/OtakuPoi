<?php

namespace Tests\Unit;

use App\Models\User;
use App\Services\AuthService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthServiceTest extends TestCase
{
    use RefreshDatabase;

    protected AuthService $authService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->authService = new AuthService();
    }

    /**
     * Test user registration.
     */
    public function test_user_can_register(): void
    {
        $result = $this->authService->register('testuser', 'test@example.com', 'password123');

        $this->assertTrue($result['success']);
        $this->assertEquals('User registered successfully', $result['message']);
        $this->assertArrayHasKey('token', $result['data']);
        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
            'name' => 'testuser',
        ]);
    }

    /**
     * Test user login.
     */
    public function test_user_can_login(): void
    {
        User::create([
            'name' => 'loginuser',
            'email' => 'login@example.com',
            'password' => Hash::make('password123'),
        ]);

        $result = $this->authService->login('login@example.com', 'password123');

        $this->assertTrue($result['success']);
        $this->assertEquals('Login successful', $result['message']);
        $this->assertArrayHasKey('token', $result['data']);
    }

    /**
     * Test login with invalid credentials.
     */
    public function test_user_cannot_login_with_invalid_credentials(): void
    {
        User::create([
            'name' => 'loginuser',
            'email' => 'login@example.com',
            'password' => Hash::make('password123'),
        ]);

        $result = $this->authService->login('login@example.com', 'wrongpassword');

        $this->assertFalse($result['success']);
        $this->assertEquals('Invalid login credentials', $result['message']);
    }
}
