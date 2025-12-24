<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FileFactory extends Factory
{
    public function definition(): array
    {
        return [
            'disk' => array_rand(array_keys(config('filesystems.disks'))),
            'path' => 'test',
            'name' => Str::random(40),
            'origin_name' => 'test_' . Str::random(10),
            'errors' => rand(0, 5)
                ? []
                : ['Файл содержит ошибки (тестовое сообщение)'],
            'upload_at' => $this->faker->boolean()
                ? User::factory()->create()->id
                : null
        ];
    }
}
