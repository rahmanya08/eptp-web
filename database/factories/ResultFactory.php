<?php

namespace Database\Factories;

use App\Models\Identity;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Result>
 */
class ResultFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'=>Identity::all()->random()->id,
            'skor'=>fake()->randomNumber(3, true),
            'sertif_url'=>fake()->imageUrl(640, 480, 'receipt'),
            'result_status'=>fake()->boolean(),
        ];
    }
}
