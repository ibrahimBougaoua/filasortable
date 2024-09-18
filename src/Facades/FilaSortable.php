<?php

namespace IbrahimBougaoua\FilaSortable\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \IbrahimBougaoua\FilaSortable\FilaSortable
 */
class FilaSortable extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \IbrahimBougaoua\FilaSortable\FilaSortable::class;
    }
}
