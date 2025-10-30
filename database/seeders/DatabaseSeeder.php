<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ProdSeeder::class);

        if(config('app.env') === 'local'){
            $this->call(LocalSeeder::class);
        }

        if(config('app.env') === 'test'){
            $this->call(TestSeeder::class);
        }
    }
}
