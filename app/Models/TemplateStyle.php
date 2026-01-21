<?php

namespace App\Models;

use App\Classes\BaseModel;
use App\Traits\HasCode;

class TemplateStyle extends BaseModel
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
