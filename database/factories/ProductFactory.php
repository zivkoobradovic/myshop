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
            'id' => $this->faker->numberBetween(1, 100),
            'store_id' => Store::factory(),
            'sku' => $this->faker->randomNumber(),
            'name' => $this->faker->word,
            'price' => $this->faker->numberBetween($min = 100, $max = 30000),
            'short_description' => $this->faker->paragraph,
            'long_description' => $this->faker->paragraph,
            'in_stock' => $this->faker->boolean,
            'badge' => 'new',
            'image' => 'https://source.unsplash.com/random',
        ];
    }
}
