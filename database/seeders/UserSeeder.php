<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\Paypal;
use App\Models\Profile;
use App\Models\User;
use App\Models\UserImage;
//use App\Models\UserImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Juan Herrera',
            //'lastname' => 'Herrera',
            'email' => 'juanherrera075@gmail.com',
            'telephone' => '+584243662542',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'estado' => 'Guarico',
            'ciudad' => 'San Juan de los Morros',
            'calle' => 'La Gloria',
            'casa' => '0208'
        ])->assignRole('Admin');

        $users = User::factory(10)->create();

        foreach ($users as $user) {

            UserImage::factory(1)->create([
                'user_id' => $user->id,
            ]);

            Card::factory(1)->create([
                'user_id' => $user->id
            ]);

            Paypal::factory(1)->create([
                'user_id' => $user->id
            ]);

            /* Profile::factory(1)->create([
                'user_id' => $user->id
            ]); */
        }
    }
}
