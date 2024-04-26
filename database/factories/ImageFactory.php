<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'imgsrc' => 'img/productsHomePage/shirt3.jpg',
            'product_id'=> $this->faker->randomElement([1,2])

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
            'imgsrc' => 'img/productsHomePage/hoodie1.png',
            'product_id' => 2
        ];
    }
}
