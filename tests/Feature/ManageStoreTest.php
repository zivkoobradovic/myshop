<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageStoreTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function user_can_see_product_index_page () 
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);
        $this->get('/products')->assertOk();
    }
}
