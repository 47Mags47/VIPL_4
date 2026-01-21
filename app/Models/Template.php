<?php

namespace App\Models;

use App\Classes\BaseModel;
use App\Traits\ThisFileModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Template extends BaseModel
{
    use HasFactory, ThisFileModel;

    ### Настройки
    ##################################################
    protected $fillable = [
        'name',
        'file_id',
        'type_id',
        'style_id',
        'chunk',
    ];

    ### Методы
    ##################################################
    //

    ### Связи
    ##################################################
    public function type(): BelongsTo
    {
        return $this->belongsTo(TemplateType::class, 'type_id');
    }
}
