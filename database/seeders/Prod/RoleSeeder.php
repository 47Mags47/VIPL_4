<?php

namespace Database\Seeders\Prod;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['code' => 'admin',    'name' => 'Администратор']);
        Role::create(['code' => 'user',     'name' => 'пользователь']);
    }
}
