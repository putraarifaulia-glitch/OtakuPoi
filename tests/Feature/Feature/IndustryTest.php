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
}
