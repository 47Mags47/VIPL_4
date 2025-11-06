<?php

namespace App\Models;

use App\Classes\BaseModel;
use App\Traits\HasCode;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Writer extends BaseModel
{
    use HasFactory, HasCode;

    ### Настройки
    ##################################################
    //

    ### Методы
    ##################################################
    //

    ### Связи
    ##################################################
    public function type(): BelongsTo
    {
        return $this->belongsTo(WriterType::class, 'type_id');
    }
}
