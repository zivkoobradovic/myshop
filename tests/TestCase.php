<?php

namespace Tests;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
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

    public function product($quantity = null)
    {
        $product = \App\Models\Product::factory()->create();
        return $product;
    }

    public function fakeImage () {
        Storage::fake('public');
        $image = UploadedFile::fake()->image('avatar.jpg');
        return $image;
    }

    public function category () {
        $category = \App\Models\Category::factory()->create();
        return $category;
    }
}
