<?php

namespace App\Models;

use App\Classes\BaseModel;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaymentEvent extends BaseModel
{
    /** @use HasFactory<\Database\Factories\PaymentEventFactory> */
    use HasFactory;

    ### Настройки
    ##################################################
    protected $fillable = [
        'date',
        'payment_id',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'datetime:Y-m-d',
        ];
    }

    ### Методы
    ##################################################
    //

    ### Связи
    ##################################################
    public function payment():BelongsTo
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }
}
