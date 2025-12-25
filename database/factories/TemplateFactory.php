<?php

namespace Database\Factories;

use App\Models\File;
use App\Models\TemplateType;
use Illuminate\Database\Eloquent\Factories\Factory;

class TemplateFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3),
            'file_id' => File::factory()->create([
                'disk' => 'templates'
            ]),
            'type_id' => TemplateType::all()->random()->id,
        ];
    }
}
