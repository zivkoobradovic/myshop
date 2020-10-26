<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function signIn($array = [])
    {
        $user = User::factory()->create($array);
        $this->actingAs($user);
        return $user;
    }

    public function product()
    {
        $product = \App\Models\Product::factory()->create();
        return $product;
    }
}
