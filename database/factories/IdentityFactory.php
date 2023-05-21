<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Identity>
 */
class IdentityFactory extends Factory
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
            'name' => fake()->name(),
            'img_url' => fake()->imageUrl(640, 480, 'people'),
            'birth_date' =>  fake()->date(),
            'gender' => fake()->randomElement(['male', 'female']),
            'identity_type' => fake()->randomElement(['KTP', 'KTM']),
            'identity_num' => fake()->numerify('################'),
            'phone' => fake()->phoneNumber(12),
            'address' => fake()->address(),
            'category'=>fake()->randomElement(['Public','Employee','Student']),
            'major' => 'Bsc',
            'program' => 'Computer Science',
            'semester' => '1',
            'jabatan'=>fake()->randomElement(['Staff','Leader']),
            'status_identitas'=>fake()->boolean(),
        ];
    }
}
