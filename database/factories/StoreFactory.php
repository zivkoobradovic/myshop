<?php

namespace Database\Factories;

use App\Models\Tax;
use App\Models\Store;
use App\Models\Currency;
use Illuminate\Database\Eloquent\Factories\Factory;

class StoreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Store::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'address' => $this->faker->address,
            'currency_id' => Currency::factory(),
            'tax_id' => Tax::factory(),
        ];
    }
}
