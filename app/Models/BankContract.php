<?php

namespace App\Models;

use App\Classes\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BankContract extends BaseModel
{
    use HasFactory;

    ### Настройки
    ##################################################
    protected function casts(): array
    {
        return [
            'signed_at' => 'datetime',
        ];
    }

    ### Методы
    ##################################################
    //

    ### Связи
    ##################################################
    public function writer(): BelongsTo
    {
        return $this->belongsTo(Writer::class, 'writer_id');
    }
}
