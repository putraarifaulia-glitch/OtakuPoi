<?php

namespace Tests\Feature;

use App\Contracts\AuthContract;
use App\Contracts\AnimeSearchContract;
use App\Contracts\UserAnimeListContract;
use App\Services\AuthService;
use App\Services\JikanApiService;
use App\Services\UserAnimeListService;
use Tests\TestCase;

class ContractBindingTest extends TestCase
{
    /**
     * Test if AuthContract is bound correctly.
     */
    public function test_auth_contract_is_bound_to_auth_service(): void
    {
        $instance = $this->app->make(AuthContract::class);
        $this->assertInstanceOf(AuthService::class, $instance);
    }

    /**
     * Test if AnimeSearchContract is bound correctly.
     */
    public function test_anime_search_contract_is_bound_to_jikan_api_service(): void
    {
        $instance = $this->app->make(AnimeSearchContract::class);
        $this->assertInstanceOf(JikanApiService::class, $instance);
    }

    /**
     * Test if UserAnimeListContract is bound correctly.
     */
    public function test_user_anime_list_contract_is_bound_to_user_anime_list_service(): void
    {
        $instance = $this->app->make(UserAnimeListContract::class);
        $this->assertInstanceOf(UserAnimeListService::class, $instance);
    }

    /**
     * Test if AuthService has required methods.
     */
    public function test_auth_service_has_required_methods(): void
    {
        $instance = $this->app->make(AuthContract::class);
        $this->assertTrue(method_exists($instance, 'register'));
        $this->assertTrue(method_exists($instance, 'login'));
        $this->assertTrue(method_exists($instance, 'logout'));
    }

    /**
     * Test if JikanApiService has required methods.
     */
    public function test_jikan_api_service_has_required_methods(): void
    {
        $instance = $this->app->make(AnimeSearchContract::class);
        $this->assertTrue(method_exists($instance, 'searchAnime'));
        $this->assertTrue(method_exists($instance, 'getTopAnime'));
    }

    /**
     * Test if UserAnimeListService has required methods.
     */
    public function test_user_anime_list_service_has_required_methods(): void
    {
        $instance = $this->app->make(UserAnimeListContract::class);
        $this->assertTrue(method_exists($instance, 'addToAnimeList'));
        $this->assertTrue(method_exists($instance, 'getUserAnimeList'));
        $this->assertTrue(method_exists($instance, 'updateAnimeStatus'));
        $this->assertTrue(method_exists($instance, 'removeFromAnimeList'));
    }
}
