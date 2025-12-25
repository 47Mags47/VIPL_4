<?php

namespace Database\Factories;

use App\Models\File;
use App\Models\TemplateType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TemplateFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3),
            'file_name' => Str::random(10),
            'file_id' => File::factory()->create([
                'disk' => 'templates'
            ]),
            'type_id' => TemplateType::all()->random()->id,
        ];
    }
}
