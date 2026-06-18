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

    /**
     * Test if genre page contains genre list.
     */
    public function test_genre_page_contains_genre_list(): void
    {
        $response = $this->get('/genre');
        $response->assertStatus(200);
        $response->assertSee('Action');
        $response->assertSee('Adventure');
        $response->assertSee('Comedy');
    }

    /**
     * Test if genre page has proper structure.
     */
    public function test_genre_page_has_proper_structure(): void
    {
        $response = $this->get('/genre');
        $response->assertStatus(200);
        $response->assertSee('genre');
    }
}
