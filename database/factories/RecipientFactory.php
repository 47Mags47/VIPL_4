<?php

namespace Database\Factories;

use App\Models\PaymentFile;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecipientFactory extends Factory
{
    public function definition(): array
    {
        $gender = $this->faker->boolean()
            ? 'male'
            : 'female';

        return [
            'file_id'           => PaymentFile::factory(),

            'first_name'        => $this->faker->firstName($gender),
            'last_name'         => $this->faker->lastName($gender),
            'middle_name'       => $this->faker->firstName('male') . ($gender === 'male' ? 'ов' : 'ова'),
            'd_rojd'            => $this->faker->date(),
            'snils'             => $this->faker->numerify('###-###-### ##'),
            'account'           => $this->faker->numerify('####################'),
            'summ'              => $this->faker->randomFloat(2),
            'p_series'          => $this->faker->numerify('####'),
            'p_number'          => $this->faker->numerify('######'),
            'p_date'            => $this->faker->date(),
            'p_div'             => $this->faker->company(),
        ];
    }
}
