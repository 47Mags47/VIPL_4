<?php

namespace App\Models;

use App\Classes\BaseModel;
use App\Traits\HasCode;

class WriterType extends BaseModel
{
    use HasCode;

    ### Настройки
    ##################################################
    protected $fillable = [
        'code',
        'name',
    ];

    ### Методы
    ##################################################
    //

    ### Связи
    ##################################################
    //
}
