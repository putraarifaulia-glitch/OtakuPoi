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
}
