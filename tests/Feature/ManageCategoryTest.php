<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageCategoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function admin_user_can_see_category_create_page()
    {
        $this->signIn(['admin' => 1]);
        $this->get('/categories/create')->assertOk();
    }

    /** @test */
    public function non_admin_user_cannot_see_category_create_page()
    {
        $this->signIn(['admin' => 0]);
        $this->get('/categories/create')->assertRedirect('/home');
    }

    /** @test */
    public function admin_can_create_new_category () 
    {
        $this->withoutExceptionHandling();
        $this->signIn(['admin' => 1]);
        $this->post('/categories', ['name' => 'new category'])->assertRedirect('/categories/create');
    }
}
