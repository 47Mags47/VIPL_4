<?php

namespace App\Models;

use App\Classes\BaseModel;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

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
        'errors',
        'upload_at',
    ];

    protected $attributes = [
        'errors' => '[]'
    ];

    protected function hasToStorage(): Attribute
    {
        return new Attribute(
            get: fn () => Storage::disk($this->disk)->has($this->path . '/' . $this->name),
        );
    }

    protected function casts(): array
    {
        return [
            'errors' => 'array',
        ];
    }

    public static function boot() {
        parent::boot();

        self::deleted(function ($model) {
            Storage::disk($model->disk)->delete($model->path . '/' . $model->name);
        });
    }

    ### Методы
    ##################################################
    //

    ### Связи
    ##################################################
    //
}
