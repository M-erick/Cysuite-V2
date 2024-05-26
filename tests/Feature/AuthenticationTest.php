<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the registration process.
     *
     * @return void
     */
    public function test_user_can_register()
    {
        // Create a role

        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'role_id' => 2
        ]);

        $response->assertStatus(302); // Redirect after registration
        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
        ]);

        $user = User::where('email', 'test@example.com')->first();
        $this->assertNotNull($user);
        $this->assertAuthenticatedAs($user);
    }

    /**
     * Test the login process.
     *
     * @return void
     */
    public function test_user_can_login()
    {
        // Create a user
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make($password = 'password'),
        ]);

        // Attempt to login
        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => $password,
        ]);

        $response->assertStatus(302); // Redirect after login
        $this->assertAuthenticatedAs($user);
    }

    /**
     * Test the logout process.
     *
     * @return void
     */
    public function test_user_can_logout()
    {
        // Create and login a user
        $user = User::factory()->create();
        $this->actingAs($user);

        // Attempt to logout
        $response = $this->post('/logout');

        $response->assertStatus(302); // Redirect after logout
        $this->assertGuest();
    }
}
