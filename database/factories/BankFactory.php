<?php

namespace Database\Factories;

use App\Models\BankContract;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bank>
 */
class BankFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => 'test_' . $this->faker->unique()->word(),
            'name' => Str::random(rand(1, 255)),
            'contract_id' => BankContract::count() > 0
                ? BankContract::all()->random()->id
                : BankContract::factory()->create()->id,
        ];
    }
}
