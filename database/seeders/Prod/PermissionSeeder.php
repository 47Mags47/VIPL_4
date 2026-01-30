<?php

namespace Database\Seeders\Prod;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['code' => 'bank_view',             'name' => 'Просмотр справочника "Банки"']);
        Permission::create(['code' => 'bank_create',           'name' => 'Создание записей справочника "Банки"']);
        Permission::create(['code' => 'bank_modify',           'name' => 'Редактирование записей справочника "Банки"']);

        Permission::create(['code' => 'bank_contract_view',    'name' => 'Просмотр справочника "Договора с банками"']);
        Permission::create(['code' => 'bank_contract_create',  'name' => 'Создание записей справочника "Договора с банками"']);
        Permission::create(['code' => 'bank_contract_modify',  'name' => 'Редактирование записей справочника "Договора с банками"']);

        Permission::create(['code' => 'division_view',         'name' => 'Просмотр справочника "Организации"']);
        Permission::create(['code' => 'division_create',       'name' => 'Создание записей справочника "Организации"']);
        Permission::create(['code' => 'division_modify',       'name' => 'Редактирование записей справочника "Организации"']);

        Permission::create(['code' => 'payment_view',          'name' => 'Просмотр справочника "Выплаты"']);
        Permission::create(['code' => 'payment_create',        'name' => 'Создание записей справочника "Выплаты"']);
        Permission::create(['code' => 'payment_modify',        'name' => 'Редактирование записей справочника "Выплаты"']);

        Permission::create(['code' => 'templates_view',        'name' => 'Просмотр справочника "Шаблоны"']);
        Permission::create(['code' => 'templates_create',      'name' => 'Создание записей справочника "Шаблоны"']);
        Permission::create(['code' => 'templates_modify',      'name' => 'Редактирование записей справочника "Шаблоны"']);
    }
}
