<?php

namespace App\Models;

use App\Classes\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PaymentRaport extends BaseModel
{
    use HasFactory;

    ### Настройки
    ##################################################
    protected $fillable = [
        'event_id'
    ];

    public static function boot()
    {
        parent::boot();

        self::deleting(function ($model) {
            $model->bankFiles->each(fn($bankFile) => $bankFile->delete());
        });
    }

    ### Методы
    ##################################################
    //

    ### Связи
    ##################################################
    public function event(): BelongsTo
    {
        return $this->belongsTo(PaymentEvent::class, 'event_id');
    }

    public function bankFiles(): HasMany
    {
        return $this->hasMany(BankFile::class, 'raport_id');
    }
}
