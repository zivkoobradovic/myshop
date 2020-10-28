<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersProductTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function anonymous_user_can_see_product_products_index_page()
    {
        $this->get('/products')->assertOk();
    }

    /** @test */
    public function anonymous_user_can_see_products_on_products_index_page()
    {
        $product = $this->product();
        $this->get('/products')
            ->assertSee($product->name);
    }

    /** @test */
    public function anonymous_user_can_see_product_on_product_page()
    {
        $product = $this->product();
        $this->get($product->path())
            ->assertSee($product->name);
    }

     /** @test */
     public function anonymous_user_cannot_view_create_new_product_page()
     {
         $this->get('/products/create')->assertRedirect('/login');
     }

    /** @test */
    public function only_admin_can_view_create_new_product_page()
    {
        $this->withoutExceptionHandling();
        $this->signIn(['admin' => true]);
        $this->get('/products/create')->assertOk();
    }

    /** @test */
    public function only_admins_can_view_admin_dashboard_page()
    {
        $this->withoutExceptionHandling();
        $user = $this->signIn(['admin' => true]);
        $this->get('/users/admin/dashboard')->assertSee($user->name);
    }


    /** @test */
    public function non_admin_user_cannot_view_create_new_product_page()
    {
        $this->signIn();
        $this->get('/products/create')->assertRedirect('/home');
    }

    /** @test */
    public function only_admin_can_view_edit_product_page () 
    {
        $this->withoutExceptionHandling();
        $this->signIn(['admin' => true]);
        $product = $this->product();
        $this->get($product->path() . '/edit')
            ->assertSee($product->name);
    }
}
