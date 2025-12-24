<?php

namespace Database\Factories;

use App\Models\Bank;
use App\Models\File;
use App\Models\PaymentEvent;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PaymentFile>
 */
class PaymentFileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'file_id'   => File::factory()->create(),
            'bank_id'   => Bank::factory()->create(),
            'event_id'  => PaymentEvent::factory()->create(),
        ];
    }
}
