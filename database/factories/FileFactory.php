<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\File>
 */
class FileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'disk' => array_rand(array_keys(config('filesystems.disks'))),
            'path' => $this->faker->word(),
            'name' => Str::random(40),
            'origin_name' => $this->faker->filePath(),
            'upload_at' => $this->faker->boolean()
                ? User::factory()->create()->id
                : null
        ];
    }
}
