<?php

namespace Kolirt\ModelFilter;

trait Filterable
{

    public static function filter($request = null)
    {
        $query = self::query();
        $query->filter($request);
        return $query;
    }

}