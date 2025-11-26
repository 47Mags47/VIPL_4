<?php

namespace App\Models;

use App\Classes\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends BaseModel
{
    use HasFactory;

    ### Настройки
    ##################################################
    protected $fillable = [
        'code',
        'name',
        'kbk',
    ];

    ### Методы
    ##################################################
    //

    ### Связи
    ##################################################
    //
}
