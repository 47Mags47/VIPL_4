<?php

namespace App\Models;

use App\Classes\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends BaseModel
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
    public function divisions(): BelongsToMany
    {
        return $this->belongsToMany(Division::class, 'user_to_division');
    }
}
