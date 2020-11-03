<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageCategoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function anonymous_user_cannot_view_create_new_category_page()
    {
        $this->get('/categories/create')->assertRedirect('/login');
    }

    /** @test */
    public function only_admin_can_view_create_new_category_page()
    {
        $this->withoutExceptionHandling();
        $this->signIn(['admin' => true]);
        $this->get('/categories/create')->assertOk();
    }

    /** @test */
    public function admin_user_can_see_category_create_page()
    {
        $this->signIn(['admin' => true]);
        $this->get('/categories/create')->assertOk();
    }

    /** @test */
    public function non_admin_user_cannot_see_category_create_page()
    {
        $this->signIn(['admin' => false]);
        $this->get('/categories/create')->assertRedirect('/home');
    }

    /** @test */
    public function only_admin_can_view_edit_category_page()
    {
        $this->withoutExceptionHandling();
        $this->signIn(['admin' => true]);
        $category = $this->category();
        $this->get($category->path() . '/edit')
            ->assertSee($category->name);
    }
}
