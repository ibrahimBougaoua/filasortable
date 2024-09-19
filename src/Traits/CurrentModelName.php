<?php

namespace IbrahimBougaoua\FilaSortable\Traits;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

trait CurrentModelName
{
    public static function getModelClassFromRoute()
    {
        $currentRoute = Route::currentRouteName();

        if (preg_match('/^filament\.admin\.resources\.(\w+)/', $currentRoute, $matches)) {
            $resourceSlug = $matches[1];

            $resourceClass = 'App\\Filament\\Resources\\'.Str::studly(Str::singular($resourceSlug)).'Resource';

            if (class_exists($resourceClass)) {
                $modelClass = 'App\\Models\\'.Str::singular(Str::studly($resourceSlug));

                if (class_exists($modelClass)) {
                    return $modelClass;
                } else {
                    return null;
                }
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
}
