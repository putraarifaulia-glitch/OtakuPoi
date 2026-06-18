<?php

namespace Tests\Feature\Feature;

use Tests\TestCase;

class StudioTest extends TestCase
{
    public function test_studio_page_is_accessible(): void
    {
        $response = $this->get('/studio');
        $response->assertStatus(200);
        $response->assertSee('Top Anime Studios');
    }

    /**
     * Test if studio page contains studio list.
     */
    public function test_studio_page_contains_studio_list(): void
    {
        $response = $this->get('/studio');
        $response->assertStatus(200);
        $response->assertSee('Studio');
        $response->assertSee('Production');
    }

    /**
     * Test if studio page has ranking information.
     */
    public function test_studio_page_has_ranking_information(): void
    {
        $response = $this->get('/studio');
        $response->assertStatus(200);
        $response->assertSee('Rank');
        $response->assertSee('Top');
    }
}
