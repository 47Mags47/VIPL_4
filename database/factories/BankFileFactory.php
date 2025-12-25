<?php

namespace Database\Factories;

use App\Models\Bank;
use App\Models\File;
use App\Models\PaymentRaport;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BankFile>
 */
class BankFileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'file_id' => File::factory()->create(),
            'bank_id' => Bank::count() > 0
                ? Bank::all()->random()->id
                : Bank::factory()->create()->id,
            'raport_id' => PaymentRaport::count() > 0
                ? PaymentRaport::all()->random()->id
                : PaymentRaport::factory()->create()->id,
        ];
    }
}
