<?php

namespace App\Models;

use App\Classes\BaseModel;
use App\Traits\HasCode;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bank extends BaseModel
{
    use HasCode, HasFactory;

    ### Настройки
    ##################################################
    protected $fillable = [
        'code',
        'name',
        'contract_id',
    ];

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
