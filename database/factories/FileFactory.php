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
            'disk' => config('filesystems.default'),
            'path' => '',
            'name' => Str::random(40),
            'origin_name' => 'test_' . Str::random(10),
            'errors' => rand(0, 5)
                ? []
                : ['Файл содержит ошибки (тестовое сообщение)'],
            'upload_at' => User::count() > 0
                ? User::all()->random()->id
                : null,
        ];
    }
}
