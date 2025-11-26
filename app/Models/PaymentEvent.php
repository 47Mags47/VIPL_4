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
    // public static function getNPP(int|Payment $payment, string|Carbon|CarbonImmutable $date){
    //     if($payment instanceof Payment)
    //         $payment = $payment->id;

    //     if($date instanceof Carbon)
    //         $date = $date->toImmutable();

    //     if(is_string($date))
    //         $date = CarbonImmutable::parse($date);

    //     return self::where('payment_id', $payment)->whereBetween('date', [$date->startOfYear(), $date->endOfYear()])
    // }

    ### Связи
    ##################################################
    public function payment():BelongsTo
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }
}
