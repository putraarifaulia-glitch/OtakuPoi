<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Test if welcome page contains expected content.
     */
    public function test_welcome_page_contains_expected_content(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Laravel');
    }

    /**
     * Test if API routes are accessible.
     */
    public function test_api_routes_are_accessible(): void
    {
        $response = $this->get('/api/v1/anime/search');

        $response->assertStatus(200);
    }
}
