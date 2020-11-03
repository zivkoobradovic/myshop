<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_a_path () 
    {
        $product = $this->product();
        $this->assertEquals('/products/' . $product->id, $product->path());
    }

    /** @test */
    public function a_product_has_categories()
    {
        $product = $this->product();
        $product->categories()->attach([
            '1',
            '2',
            '3'
        ]);
        $this->assertDatabaseHas('category_product', [
            'category_id' => 2,
            'product_id' => $product->id
        ]);
    }
}
