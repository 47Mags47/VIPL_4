<?php

namespace Database\Factories;

use App\Models\Bank;
use App\Models\File;
use App\Models\PaymentEvent;
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
            'bank_id' => Bank::factory()->create(),
            'event_id' => PaymentEvent::factory()->create(),
        ];
    }
}
