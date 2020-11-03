<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class CategoryTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function it_has_a_path () 
    {
        $category = $this->category();
        $this->assertEquals('/categories/' . $category->id, $category->path());
    }
}
