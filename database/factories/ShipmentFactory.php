<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shipment>
 */
class ShipmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'date' => $this->faker->date('Y-m-d', 'now'),
            'price' => $this->faker->randomFloat(2, 7, 28),
            'user_id' => User::all()->random()->id,
            //'order_id' => Order::all()->random()->id,
        ];
    }
}
