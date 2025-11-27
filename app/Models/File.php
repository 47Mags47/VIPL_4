<?php

namespace App\Models;

use App\Classes\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class File extends BaseModel
{
    ### Настройки
    ##################################################
    use HasFactory;

    protected $fillable = [
        'disk',
        'path',
        'name',
        'origin_name',
    ];

    ### Методы
    ##################################################
    //

    ### Связи
    ##################################################
    public function file(): HasOne {
        return $this->hasOne(File::class, 'id', 'file_id');
    }
}
