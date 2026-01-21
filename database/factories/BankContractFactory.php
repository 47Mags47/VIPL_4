<?php

namespace Database\Factories;

use App\Models\Template;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BankContract>
 */
class BankContractFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number' => Str::random(rand(3, 15)),
            'signed_at' => now()->subDays(rand(0, 365))->format('Y-m-d'),
            'template_id' => Template::randomOrCreate()->id,
        ];
    }
}
