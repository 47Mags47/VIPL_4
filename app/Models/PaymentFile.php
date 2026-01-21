<?php

namespace App\Models;

use App\Classes\BaseModel;
use App\Traits\ThisFileModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PaymentFile extends BaseModel
{
    ### Настройки
    ##################################################
    use HasFactory, ThisFileModel;

    protected $fillable = [
        'file_id',
        'bank_id',
        'event_id'
    ];

    ### Методы
    ##################################################

    ### Связи
    ##################################################
    public function recipients(): HasMany
    {
        return $this->hasMany(Recipient::class, 'file_id');
    }
}
