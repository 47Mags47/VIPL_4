<?php

namespace App\Models;

use App\Classes\BaseModel;
use App\Traits\ThisFileModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BankFile extends BaseModel
{
    use HasFactory, ThisFileModel;

    ### Настройки
    ##################################################
    protected $fillable = [
        'bank_id',
        'event_id',
        'raport_id',
        'file_id'
    ];

    ### Методы
    ##################################################
    //

    ### Связи
    ##################################################
    public function bank(): BelongsTo
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }

    public function raport(): BelongsTo
    {
        return $this->belongsTo(PaymentRaport::class, 'raport_id');
    }
}
