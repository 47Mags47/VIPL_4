<?php

namespace App\Models;

use App\Classes\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Division extends BaseModel
{
    use HasFactory;

    ### Настройки
    ##################################################
    //

    ### Методы
    ##################################################
    //

    ### Связи
    ##################################################
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_to_division');
    }
}
