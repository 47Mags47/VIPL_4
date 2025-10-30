<?php

namespace App\Models;

use App\Classes\BaseModel;
use App\Traits\HasCode;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bank extends BaseModel
{
    use HasCode;

    ### Настройки
    ##################################################
    //

    ### Методы
    ##################################################
    //

    ### Связи
    ##################################################
    public function contract(): BelongsTo
    {
        return $this->belongsTo(BankContract::class, 'contract_id');
    }
}
