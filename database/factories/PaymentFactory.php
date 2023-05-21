<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Schedule;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'=>User::all()->random()->id,
            //'schedule_id' => Schedule::all()->random()->id,
            'pay_url'=>fake()->imageUrl(640, 480, 'receipt'),
            'is_payed'=>fake()->boolean()
        ];
    }
}
