<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminAuthTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    public function test_guest_is_redirected_to_login_from_dashboard(): void
    {
        $this->get(route('admin.dashboard'))
            ->assertRedirect(route('admin.login'));
    }

    public function test_login_page_is_accessible(): void
    {
        $this->get(route('admin.login'))->assertOk()->assertSee('Panel Admin');
    }

    public function test_admin_can_log_in(): void
    {
        $response = $this->post(route('admin.login.attempt'), [
            'email' => 'admin@masjidsumpahmasigit.id',
            'password' => 'admin123',
        ]);

        $response->assertRedirect(route('admin.dashboard'));

        $this->assertAuthenticated();
    }

    public function test_invalid_credentials_are_rejected(): void
    {
        $response = $this->post(route('admin.login.attempt'), [
            'email' => 'admin@masjidsumpahmasigit.id',
            'password' => 'salah-password',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_non_admin_user_cannot_access_dashboard(): void
    {
        $user = User::create([
            'name' => 'Pengguna Biasa',
            'email' => 'pengguna@example.com',
            'password' => bcrypt('password123'),
            'is_admin' => false,
        ]);

        $response = $this->actingAs($user)
            ->get(route('admin.dashboard'));

        $response->assertForbidden();
    }

    public function test_admin_can_access_dashboard(): void
    {
        $admin = User::where('is_admin', true)->firstOrFail();

        $this->actingAs($admin)
            ->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee('Dashboard');
    }

    public function test_admin_can_log_out(): void
    {
        $admin = User::where('is_admin', true)->firstOrFail();

        $this->actingAs($admin)
            ->post(route('admin.logout'))
            ->assertRedirect(route('admin.login'));

        $this->assertGuest();
    }
}