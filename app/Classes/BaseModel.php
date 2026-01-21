<?php

namespace App\Classes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model
{
    ### Методы
    ##################################################
    public static function getTableName()
    {
        return with(new static)->getTable();
    }

    public function scopeFilter(Builder $builder): Builder
    {
        $namespace = $this::class;
        $className = explode('\\', $namespace)[count(explode('\\', $namespace)) - 1];

        if (class_exists("\\App\\Filters\\$className")) {
            $filterClass = "\\App\\Filters\\$className";
            $filter = new $filterClass();

            $builder = $filter->apply($builder);
        } else {
            $builder = new \App\Classes\Filter($builder)->apply();
        }

        return $builder;
    }

    public static function getResource()
    {
        $query = self::Filter();

        $data = (request()->has('paginate') and (int) request()->input('paginate') > 0)
            ? $query->paginate(request()->input('paginate'))
            : $query->get();

        return $data->toResourceCollection();
    }

    public static function findFromArray(array $array)
    {
        return self::where(function ($query) use ($array) {
            foreach ($array as $column => $value) {
                if (!in_array($column, new static()->getHidden()) and in_array($column, new static()->getFillable()))
                    $query->where($column, $value);
            }
        })->get();
    }

    public static function randomOrCreate(array $attributes = [])
    {
        return self::count() > 0
            ? self::all()->random()
            : self::factory()->create($attributes);
    }
}
