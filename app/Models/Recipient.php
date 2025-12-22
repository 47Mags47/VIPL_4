<?php

namespace App\Models;

use App\Classes\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipient extends BaseModel
{
    use HasFactory;

    ### Настройки
    ##################################################
    protected $fillable = [
        'file_id',
        'first_name',
        'last_name',
        'middle_name',
        'd_rojd',
        'snils',
        'account',
        'summ',
        'p_series',
        'p_number',
        'p_date',
        'p_div',
    ];

    protected function casts(): array
    {
        return [
            'd_rojd' => 'date',
            'p_date' => 'date',
        ];
    }

    ### Методы
    ##################################################
    //

    ### Связи
    ##################################################
    public function file(){
        return $this->belongsTo(PaymentFile::class, 'file_id');
    }
}
