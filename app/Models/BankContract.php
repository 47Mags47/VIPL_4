<?php

namespace App\Models;

use App\Classes\BaseModel;
use App\Policies\BankContractPolicy;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[UsePolicy(BankContractPolicy::class)]
class BankContract extends BaseModel
{
    use HasFactory;

    ### Настройки
    ##################################################
    protected $fillable = [
        'number',
        'signed_at',
        'template_id',
    ];

    protected function casts(): array
    {
        return [
            'signed_at' => 'datetime:Y-m-d',
        ];
    }

    ### Методы
    ##################################################
    //

    ### Связи
    ##################################################
    public function template(): BelongsTo
    {
        return $this->belongsTo(Template::class, 'template_id');
    }
}
