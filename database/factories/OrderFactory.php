<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'quantity' => $this->faker-> numberBetween($min = 1, $max = 100),
            'subtotal' => $this->faker->randomFloat(2, 25, 999),
            'pendiente' =>$this->faker->randomElement([1, 2]),
            'user_id' => User::all()->random()->id,
        ];
    }
}
