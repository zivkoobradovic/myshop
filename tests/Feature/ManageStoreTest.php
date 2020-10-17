<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageStoreTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function user_can_see_product_products_index_page () 
    {
        $this->get('/products')->assertOk();
    }

    /** @test */
    public function user_can_see_products_on_products_index_page () 
    {
        $this->withoutExceptionHandling();
        $product = Product::factory()->make();
        $this->get('/products')
            ->assertSee($product->name);
    }
}
