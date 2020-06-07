<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_it_has_an_vlidation_error_for_user()
    {
        $response = $this->post('/posts',[]);

        $response->assertStatus(422);
    }

    public function test_it_returns_an_posts()
    {
        $response = $this->get('/posts');

        $response->assertJsonStructure(['data'=>[]]);
    }
}
