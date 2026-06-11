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
}
