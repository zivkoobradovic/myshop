<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageStoreTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function lala () 
    {
        $this->get('/')->assertOk();
    }
    
}
