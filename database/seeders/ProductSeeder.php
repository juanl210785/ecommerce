<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductImage;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $products = Product::factory(100)->create();

        foreach ($products as $product) {
            ProductImage::factory(rand(1,3))->create([
                'product_id' => $product->id
            ]);
        }
    }
}
