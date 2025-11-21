<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = rand(1,2) === 1 ? 'male' : 'female';

        return [
            'first_name'        => $this->faker->firstName($gender),
            'last_name'         => $this->faker->lastName($gender),
            'middle_name'       => $this->faker->firstName('male') . ($gender === 'male' ? 'ов' : 'ова'),
            'email'             => $this->faker->email(),
            'password'          => Hash::make($this->faker->word),
            'password_expired'  => (bool) rand(0, 1),
            'email_verified_at' => now()->subDay(rand(1, 364)),
            'deleted_at'        => rand(0, 10) === 10 ? now() : null
        ];
    }
}
