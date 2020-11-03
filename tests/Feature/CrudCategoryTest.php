<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CrudCategoryTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function admin_can_create_new_category()
    {
        $this->withoutExceptionHandling();
        $this->signIn(['admin' => true]);
        $this->post('/categories', ['name' => 'new category'])->assertRedirect('/categories/create');
    }

    /** @test */
    public function admin_can_update_category()
    {
        $this->withoutExceptionHandling();
        $this->signIn(['admin' => true]);
        $category = $this->category();
        $newCategoryName = 'new category';
        $this->patch('/categories/' . $category->id, ['name' => $newCategoryName])->assertRedirect($category->path() . '/edit');
        $this->assertDatabaseHas('categories', ['name' => $newCategoryName]);
        $this->get($category->path() . '/edit')->assertSee($newCategoryName);
    }
}
