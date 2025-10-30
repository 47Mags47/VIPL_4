<?php

namespace Database\Seeders\Local;

use App\Models\Writer;
use App\Models\WriterType;
use Illuminate\Database\Seeder;

class WriterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Writer::create(['code' => 'bank: Sber',         'name' => 'Банковский файл: Сбербанк',      'class' => '', 'type_id' => WriterType::byCode('bank file')->id]);
        Writer::create(['code' => 'bank: UralSib',      'name' => 'Банковский файл: УралСиб',       'class' => '', 'type_id' => WriterType::byCode('bank file')->id]);
        Writer::create(['code' => 'bank: RosSelhoz',    'name' => 'Банковский файл: РосСельхоз',    'class' => '', 'type_id' => WriterType::byCode('bank file')->id]);
        Writer::create(['code' => 'bank: Pochta',       'name' => 'Банковский файл: Почта',         'class' => '', 'type_id' => WriterType::byCode('bank file')->id]);
        Writer::create(['code' => 'bank: VTB',          'name' => 'Банковский файл: ВТБ',           'class' => '', 'type_id' => WriterType::byCode('bank file')->id]);
        Writer::create(['code' => 'bank: KBB',          'name' => 'Банковский файл: КББ',           'class' => '', 'type_id' => WriterType::byCode('bank file')->id]);
        Writer::create(['code' => 'bank: Levobereg',    'name' => 'Банковский файл: Левобережный',  'class' => '', 'type_id' => WriterType::byCode('bank file')->id]);
        Writer::create(['code' => 'bank: Alfa',         'name' => 'Банковский файл: Альфа',         'class' => '', 'type_id' => WriterType::byCode('bank file')->id]);
        Writer::create(['code' => 'bank: Sovkom',       'name' => 'Банковский файл: Совком',        'class' => '', 'type_id' => WriterType::byCode('bank file')->id]);
        Writer::create(['code' => 'bank: ATB',          'name' => 'Банковский файл: АТБ',           'class' => '', 'type_id' => WriterType::byCode('bank file')->id]);
        Writer::create(['code' => 'bank: other',        'name' => 'Банковский файл: Другие',        'class' => '', 'type_id' => WriterType::byCode('bank file')->id]);
    }
}
