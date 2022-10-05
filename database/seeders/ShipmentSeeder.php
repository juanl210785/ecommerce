<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Shipment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
       $orders = Order::factory(25)->create();

       foreach ($orders as $order) {
            Shipment::factory(1)->create([
                'order_id' => $order->id
            ]);
            $order->products()->attach([
                rand(1,50),
                rand(51,100),
            ]);
       }
/* 
       $order_product = OrderProduct::factory(50)->create([
            'cantidad' => $this->faker->numberBetween($min = 1, $max = 100)
        ]); */
    }
}
