<?php

namespace Database\Seeders\Local;

use App\Models\Bank;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bank::create(['code' => 'Sber',         'name' => 'Сбербанк',       'contract_id' => 1]);
        Bank::create(['code' => 'UralSib',      'name' => 'УралСиб',        'contract_id' => 2]);
        Bank::create(['code' => 'RosSelhoz',    'name' => 'РосСельхоз',     'contract_id' => 3]);
        Bank::create(['code' => 'Pochta',       'name' => 'Почта',          'contract_id' => 4]);
        Bank::create(['code' => 'VTB',          'name' => 'ВТБ',            'contract_id' => 5]);
        Bank::create(['code' => 'KBB',          'name' => 'КББ',            'contract_id' => 6]);
        Bank::create(['code' => 'Levobereg',    'name' => 'Левобережный',   'contract_id' => 7]);
        Bank::create(['code' => 'Alfa',         'name' => 'Альфа',          'contract_id' => 8]);
        Bank::create(['code' => 'Sovkom',       'name' => 'Совком',         'contract_id' => 9]);
        Bank::create(['code' => 'ATB',          'name' => 'АТБ',            'contract_id' => 10]);
        Bank::create(['code' => 'other',        'name' => 'Другой',         'contract_id' => 11]);
    }
}
