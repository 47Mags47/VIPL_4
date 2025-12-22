<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocalSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(Local\WriterSeeder::class);
        $this->call(Local\BankContractSeeder::class);
        $this->call(Local\BankSeeder::class);
        $this->call(Local\DivisionSeeder::class);
        $this->call(Local\UserSeeder::class);
        $this->call(Local\PaymentSeeder::class);
        $this->call(Local\TemplateSeeder::class);
        $this->call(Local\PaymentEventSeeder::class);
        $this->call(Local\PaymentFileSeeder::class);
        $this->call(Local\RecipientSeeder::class);
    }
}
