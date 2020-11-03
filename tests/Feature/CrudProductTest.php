<?php

namespace Tests\Feature;

use App\Models\Category;
use Tests\TestCase;
use App\Models\Product;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CrudProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function only_admin_can_create_product()
    {
        $this->withoutExceptionHandling();
        $this->signIn(['admin' => true]);

        $product = [
            'id' => random_int(1, 100),
            'sku' => random_int(1, 100),
            'name' => 'word',
            'price' => 1234,
            'short_description' => 'short',
            'long_description' => 'long',
            'in_stock' => 1,
            'badge' => 'new',
            'image' => $this->fakeImage()
        ];
        $response = $this->post('/products', $product);
        $productDb = Product::latest()->first();
        $this->assertEquals($productDb->sku, $product['sku']);
        $response->assertRedirect($productDb->path());
    }


    /** @test */
    public function only_admins_can_update_a_product()
    {
        $this->withoutExceptionHandling();
        $this->signIn(['admin' => true]);
        $product = Product::factory()->create();
        $response = $this->patch('/products/' . $product->id, [
            'name' => 'Changed',
            'sku' => $product->sku,
            'badge' => $product->badge,
            'price' => $product->price,
            'in_stock' => $product->in_stock,
            'short_description' => $product->short_description,
            'long_description' => $product->long_description,
            'image' => $this->fakeImage()
        ]);
        $response->assertRedirect(route('product.show', ['product' => $product->id]));
        $updatedProduct = Product::find($product->id);
        $this->assertDatabaseHas('products', ['name' => $updatedProduct->name]);
        $this->assertNotEquals($product->name, $updatedProduct->name);
    }

    /** @test */
    public function only_admins_can_delete_a_product()
    {
        $this->withoutExceptionHandling();
        $this->signIn(['admin' => true]);
        $product = Product::factory()->create();
        $this->delete($product->path())->assertRedirect('/products');
        $this->assertDatabaseMissing('products', $product->toArray());
    }
}
