<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->realText(10),
            'description' => $this->faker->realText(100),
            'category' => $this->faker->randomElement(['t-shirt',"sweatshirt"]),
            'color' => "black",
            'price' => $this->faker->numberBetween(30,100)
        ];
    }
    /**
     * Define a state for a different product ID.
     *
     * @return array<string, mixed>
     */
    public function otherProductId(): array
    {
        return [
            'name' => $this->faker->realText(10),
            'description' => $this->faker->realText(100),
            'category' => 'sweatshirt',
            'price' => 35.5,
        ];
    }
}
