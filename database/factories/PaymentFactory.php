<?php

namespace Database\Factories;

use App\Models\Test;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Psr\Http\Message\UploadedFileFactoryInterface;

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
            'user_id' => User::all()->random()->id,
            'test_id' => Test::all()->random()->id,
            'register_date' => fake()->date(),
            'payment_doc' => fake()->imageUrl(640, 480, 'receipt'),
            'is_verified' => fake()->boolean(),
        ];
    }
}
