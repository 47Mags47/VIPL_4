<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    public function definition(): array
    {
        $gender = $this->faker->boolean()
            ? 'male'
            : 'female';

        $first_name = $this->faker->firstName($gender);
        $last_name = $this->faker->lastName($gender);
        $middle_name = $this->faker->firstName('male') . ($gender === 'male' ? 'ов' : 'ова');

        $full_name = mb_ucfirst($last_name) . ' ' . mb_substr(mb_ucfirst($first_name), 0, 1) . '.' . mb_substr(mb_ucfirst($middle_name), 0, 1);

        return [
            'first_name'        => $first_name,
            'last_name'         => $last_name,
            'middle_name'       => $middle_name,
            'full_name'         => $full_name,
            'login'             => $this->faker->unique()->word(),
            'email'             => $this->faker->unique()->email(),
            'password'          => Hash::make($this->faker->word),
            'password_expired'  => (bool) rand(0, 1),
            'role_id'           => Role::byCode('user')->id,
            'email_verified_at' => now()->subDay(rand(1, 364)),
            'deleted_at'        => rand(0, 10) === 10 ? now() : null
        ];
    }
}
