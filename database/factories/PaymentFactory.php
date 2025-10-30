<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition(): array
    {
        $code = $this->faker->unique()->numerify('0##');

        return [
            'code' => $code,
            'name' => 'Выплата №' . $code . ' ' . $this->faker->word() . ' ' . $this->faker->word(),
            'kbk' => $this->faker->numerify('88810030240#########'),
        ];
    }
}
