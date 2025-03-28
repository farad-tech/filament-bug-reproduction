<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Http\Controllers\Auth\Authcontroller;
use App\Models\User;
class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        echo Authcontroller::createAuthenticationToken(User::find(10001))->plainTextToken;

        $response->assertStatus(200);
    }
}
