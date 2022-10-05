<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Card;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Order;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        $this->call(RolSeeder::class);
        $this->call(UserSeeder::class);
        Category::factory(3)->create();
        $this->call(ProductSeeder::class);
        Comment::factory(35)->create();
        $this->call(ShipmentSeeder::class);
    }
}
