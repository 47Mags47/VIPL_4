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
        Permission::create(['code' => 'bank_viewAny',          'name' => 'Просмотр справочника "Банки"']);
        Permission::create(['code' => 'bank_view',             'name' => 'Просмотр записи из справочника "Банки"']);
        Permission::create(['code' => 'bank_create',           'name' => 'Создание записей справочника "Банки"']);
        Permission::create(['code' => 'bank_update',           'name' => 'Редактирование записей справочника "Банки"']);
        Permission::create(['code' => 'bank_delete',           'name' => 'Удаление записей справочника "Банки"']);

        Permission::create(['code' => 'bank_contract_viewAny', 'name' => 'Просмотр справочника "Договора с банками"']);
        Permission::create(['code' => 'bank_contract_view',    'name' => 'Просмотр записи из справочника "Договора с банками"']);
        Permission::create(['code' => 'bank_contract_create',  'name' => 'Создание записей справочника "Договора с банками"']);
        Permission::create(['code' => 'bank_contract_update',  'name' => 'Редактирование записей справочника "Договора с банками"']);
        Permission::create(['code' => 'bank_contract_delete',  'name' => 'Удаление записей справочника "Договора с банками"']);

        Permission::create(['code' => 'division_viewAny',      'name' => 'Просмотр справочника "Организации"']);
        Permission::create(['code' => 'division_view',         'name' => 'Просмотр записи из справочника "Организации"']);
        Permission::create(['code' => 'division_create',       'name' => 'Создание записей справочника "Организации"']);
        Permission::create(['code' => 'division_update',       'name' => 'Редактирование записей справочника "Организации"']);
        Permission::create(['code' => 'division_delete',       'name' => 'Удаление записей справочника "Организации"']);

        Permission::create(['code' => 'payment_viewAny',       'name' => 'Просмотр справочника "Выплаты"']);
        Permission::create(['code' => 'payment_view',          'name' => 'Просмотр записи из справочника "Выплаты"']);
        Permission::create(['code' => 'payment_create',        'name' => 'Создание записей справочника "Выплаты"']);
        Permission::create(['code' => 'payment_update',        'name' => 'Редактирование записей справочника "Выплаты"']);
        Permission::create(['code' => 'payment_delete',        'name' => 'Удаление записей справочника "Выплаты"']);

        Permission::create(['code' => 'templates_viewAny',     'name' => 'Просмотр справочника "Шаблоны"']);
        Permission::create(['code' => 'templates_view',        'name' => 'Просмотр записи из справочника "Шаблоны"']);
        Permission::create(['code' => 'templates_create',      'name' => 'Создание записей справочника "Шаблоны"']);
        Permission::create(['code' => 'templates_update',      'name' => 'Редактирование записей справочника "Шаблоны"']);
        Permission::create(['code' => 'templates_delete',      'name' => 'Удаление записей справочника "Шаблоны"']);
    }
}
