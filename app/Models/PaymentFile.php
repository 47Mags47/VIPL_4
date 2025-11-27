<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentFile extends File
{
    ### Настройки
    ##################################################
    use HasFactory;

    protected $fillable = [
        'file_id',
        'bank_id',
        'event_id'
    ];

    public static function boot()
    {
        parent::boot();

        self::deleted(function ($model) {
            $model->file->delete();
        });
    }

    ### Методы
    ##################################################
    //

    ### Связи
    ##################################################
    //
}
