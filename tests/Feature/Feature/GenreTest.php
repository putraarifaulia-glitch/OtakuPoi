<?php

namespace Tests\Feature\Feature;

use Tests\TestCase;

class GenreTest extends TestCase
{
    public function test_genre_page_is_accessible(): void
    {
        $response = $this->get('/genre');
        $response->assertStatus(200);
        $response->assertSee('Browse by Genre');
    }
}
