<?php

namespace App\Classes;

use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model
{
    ### Методы
    ##################################################
    public static function getTableName()
    {
        return with(new static)->getTable();
    }

    public static function getResource()
    {
        $query = self::query();

        $data = (request()->has('paginate') && request()->boolean('paginate'))
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
}
