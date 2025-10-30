<?php

namespace Database\Seeders\Local;

use App\Models\Division;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Division::all()->each(function($division){
            $user = User::factory()->create();
            $division->users()->attach($user->id);
        });
    }
}
