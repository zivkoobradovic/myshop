<?php

namespace Tests\Feature;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageCartTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_cart_page()
    {
        $this->withoutExceptionHandling();
        $this->get('/cart')->assertOk();
    }

    /** @test */
    public function user_can_add_product_to_a_cart()
    {
        $this->withoutExceptionHandling();
        $product = $this->product();
        $this->post('/cart', [
            'id' => $product->id,
            'name' => $product->name,
            'qty' => 1,
            'price' => $product->price,
            'weight' => 0
        ])->assertSessionHas('cart');
        $this->assertEquals(1, Cart::count());
        $cartItem = Cart::get(Cart::content()->first()->rowId);
        $this->assertEquals($product->name, $cartItem->name);
    }
}
