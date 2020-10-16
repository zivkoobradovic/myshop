<?php

namespace Database\Factories;

use App\Models\Store;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'store' => Store::factory(),
            'sku' => $this->faker->randomNumber(10),
            'name' => $this->faker->words(2),
            'price'=> $this->numberBetween($min = 100, $max = 30000),
            'short_description' => $this->faker->paragraph,
            'long_description' => $this->faker->paragraphs,
            'in_stock' => $this->faker->boolean,
            'badge' => 'new',
            'main_image' => $this->faker->image('https://source.unsplash.com/collection/4814656/',640,480, null, false),
        ];
    }
}
