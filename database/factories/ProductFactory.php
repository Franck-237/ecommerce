<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Product>
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
        $product_name = $this->faker->unique()->words($nb=2, $asText = True);
        $slug = Str::slug($product_name, '-');
        return [
            'name' => $product_name,
            'slug' => $slug,
            'short_description' => $this->faker->text(200),
            'description' => $this->faker->text(500),
            'regular_price' => $this->faker->numberBetween(10, 500),
            'SKU' => $this->faker->unique()->numberBetween(100, 500),
            'stock_status' => $this->faker->randomElement(['instock', 'outstock']),
            'quantity' => $this->faker->numberBetween(10, 50),
            'image' => 'product-'.$this->faker->numberBetween(1, 16),
            'category_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
