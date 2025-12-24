<?php

namespace App\Models;

use App\Classes\BaseModel;
use App\Traits\ThisFileModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BankFile extends BaseModel
{
    use HasFactory, ThisFileModel;

    ### Настройки
    ##################################################
    protected $fillable = [
        'bank_id',
        'event_id',
        'file_id',
    ];

    ### Методы
    ##################################################
    //

    ### Связи
    ##################################################
    //
}
