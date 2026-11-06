<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
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

    public function test_the_example_pages_load(): void
    {
        $this->get('/image')->assertOk()->assertSee('A view with an image.');
        $this->get('/form')->assertOk()->assertSee('A form with a route.');
        $this->get('/table')->assertOk()->assertSee('Amina Yusuf');
    }

    public function test_the_example_form_can_be_submitted(): void
    {
        $response = $this->post('/form', [
            'name' => 'Jordan Lee',
            'email' => 'jordan@example.com',
            'message' => 'Learning Laravel routes.',
        ]);

        $response->assertRedirect('/form')->assertSessionHas('success');
    }

    public function test_the_example_form_rejects_a_name_that_starts_with_a_lowercase_letter(): void
    {
        $response = $this->from('/form')->post('/form', [
            'name' => 'jordan Lee',
            'email' => 'jordan@example.com',
            'message' => 'Learning Laravel routes.',
        ]);

        $response->assertRedirect('/form')
            ->assertSessionHasErrors('name');
    }
}
