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
        $file = File::factory()->create([
            'disk' => 'local',
            'path' => 'test',
            'name' => 'payment-file.csv',
            'origin_name' => 'test_' . Str::random(10),
        ]);

        return [
            'file_id' => $file->id,
            'bank_id' => Bank::count() > 0
                ? Bank::all()->random()->id
                : Bank::factory()->create()->id,
            'event_id' => PaymentEvent::count() > 0
                ? PaymentEvent::all()->random()->id
                : PaymentEvent::factory()->create()->id,
        ];
    }
}
