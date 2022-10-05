<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\User;

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
    public function definition()
    {
        $name = $this->faker->unique()->sentence();
        return [
            'name' => $name,
            'marca' => $this->faker->word(20),
            'modelo' => $this->faker->word(20),
            'stock' => $this->faker->numberBetween($min = 1, $max = 100),
            'price' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 500),
            'slug' => Str::slug($name),
            'status' =>$this->faker->randomElement([1, 2]),
            'user_id' => User::all()->random()->id,
            'category_id' => Category::all()->random()->id,
        ];
    }
}
