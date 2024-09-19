<?php

namespace IbrahimBougaoua\FilaSortable\Traits;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

trait SortOrder
{
    public static function isSortOrderExist($currentModel)
    {
        if (! class_exists($currentModel)) {
            return false;
        }

        $modelInstance = new $currentModel;
        $tableName = $modelInstance->getTable();

        return Schema::hasColumn($tableName, 'sort_order');
    }

    public static function checkAndAddSortOrderColumn($currentModel)
    {
        $modelInstance = new $currentModel;
        $tableName = $modelInstance->getTable();

        if (! SortOrder::isSortOrderExist($currentModel)) {
            Schema::table($tableName, function (Blueprint $table) {
                $table->integer('sort_order')->nullable()->default(0);
            });

            self::setDefaultSortOrder($currentModel);
        }
    }

    public static function removeSortOrderColumn($currentModel)
    {
        $modelInstance = new $currentModel;
        $tableName = $modelInstance->getTable();

        if (Schema::hasColumn($tableName, 'sort_order')) {
            Schema::table($tableName, function (Blueprint $table) {
                $table->dropColumn('sort_order');
            });
        }
    }

    public static function setDefaultSortOrder($currentModel)
    {
        $currentModel::query()->update(['sort_order' => DB::raw('id')]);
    }
}
