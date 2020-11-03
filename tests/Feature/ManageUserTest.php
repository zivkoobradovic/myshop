<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function if_logged_user_is_admin_redirect_user_to_the_admin_dashboard()
    {
        $this->withoutExceptionHandling();
        $adminUser = User::factory()->create(['admin' => 1]);
        $this->post('/login', ['email' => $adminUser->email, 'password' => 'password'])->assertRedirect('/admin/dashboard');
    }

    /** @test */
    public function if_logged_user_is_not_admin_redirect_user_to_the_homepage()
    {
        $this->withoutExceptionHandling();
        $adminUser = User::factory()->create(['admin' => 0]);
        $this->post('/login', ['email' => $adminUser->email, 'password' => 'password'])->assertRedirect('/home');
    }
}
