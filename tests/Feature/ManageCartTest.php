<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageCartTest extends TestCase
{
    /** @test */
    public function user_can_see_cart_page () 
    {
        $this->withoutExceptionHandling();
        $this->get('/cart')->assertOk();
    }
}
