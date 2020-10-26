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
}
