<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_404_response()
    {
        $response = $this->get('/nonexistent');
        $response->assertStatus(404);
    }

    public function test_the_application_returns_a_200_response()
    {
        $response = $this->get('/posts');
        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_200_response_for_post()
    {
        $response = $this->get('/posts/1');
        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_404_response_for_post()
    {
        $response = $this->get('/posts/1000');
        $response->assertStatus(404);
    }

    public function test_the_application_returns_a_200_response_for_post_create()
    {
        $response = $this->get('/posts/create');
        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_200_response_for_post_edit()
    {
        $response = $this->get('/posts/1/edit');
        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_404_response_for_post_edit()
    {
        $response = $this->get('/posts/1000/edit');
        $response->assertStatus(404);
    }

    public function test_the_application_returns_a_200_response_for_post_delete()
    {
        $response = $this->delete('/posts/1');
        $response->assertStatus(302);
    }

    public function test_the_application_returns_a_404_response_for_post_delete()
    {
        $response = $this->delete('/posts/1000');
        $response->assertStatus(404);
    }

    public function test_can_fetch_all_communities()
    {
        $response = $this->get('/community');
        $response->assertStatus(200);
    }

    public function test_can_fetch_single_community()
    {
        $response = $this->get('/community/1');
        $response->assertStatus(200);
    }

    public function test_can_create_comunity()
    {
        $response = $this->get('/community/create');
        $response->assertStatus(200);
    }

    public function test_can_update_comunity()
    {
        $response = $this->get('/community/1/edit');
        $response->assertStatus(200);
    }

    public function test_can_delete_comunity()
    {
        $response = $this->delete('/community/1');
        $response->assertStatus(302);
    }

    public function test_guests_cannot_create_comunity()
    {
        $response = $this->post('/community', [
            'name' => 'Test Community',
            'description' => 'Test Community Description',
        ]);
        $response->assertStatus(401);
    }
}
