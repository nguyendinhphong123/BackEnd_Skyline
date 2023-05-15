<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'name' => Str::random(10),
                'price' => mt_rand(10,100),
                'quantity' => mt_rand(10,100),
                'description' => Str::random(10).' '.Str::random(50),
                'category_id' =>1,
                'image' => 'http://'.Str::random(10)
        ];
    }
}
