<?php

namespace Database\Seeders\Prod;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::all()->each(fn($permission) => Role::byCode('admin')->permissions()->attach($permission->id));
    }
}
