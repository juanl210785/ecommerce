<?php

namespace Database\Factories;

use App\Models\UserImage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserImage>
 */
class UserImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = UserImage::class;

    //$this->fake()->image('public/storage/users', 640, 480, null, false)

    public function definition()
    {
        return [
            'url' => 'users/' . rand(1,12) . '.jpg'
        ];
    }
}
