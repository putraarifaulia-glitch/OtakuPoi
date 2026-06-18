<?php

namespace Tests\Feature\Feature;

use Tests\TestCase;

class IndustryTest extends TestCase
{
    public function test_industry_page_is_accessible(): void
    {
        $response = $this->get('/industry');

        $response->assertStatus(200);
        $response->assertSee('Latest Industry News');
    }

    /**
     * Test if industry page contains news sections.
     */
    public function test_industry_page_contains_news_sections(): void
    {
        $response = $this->get('/industry');
        $response->assertStatus(200);
        $response->assertSee('News');
        $response->assertSee('Updates');
    }

    /**
     * Test if industry page has proper navigation.
     */
    public function test_industry_page_has_proper_navigation(): void
    {
        $response = $this->get('/industry');
        $response->assertStatus(200);
        $response->assertSee('Home');
        $response->assertSee('Industry');
    }
}
