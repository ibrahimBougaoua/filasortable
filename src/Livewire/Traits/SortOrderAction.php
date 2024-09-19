<?php

namespace IbrahimBougaoua\FilaSortable\Livewire\Traits;

use IbrahimBougaoua\FilaSortable\Traits\SortOrder;
use Illuminate\Support\Facades\DB;

trait SortOrderAction
{
    public $hasSortOrder = false;

    public function sort()
    {
        if ($this->hasSortOrder) {
            SortOrder::removeSortOrderColumn($this->currentModel);

            session()->flash('error', __('filasortable::filasortable.Sortable is disactivated successfully !'));
        } else {
            SortOrder::checkAndAddSortOrderColumn($this->currentModel);

            session()->flash('success', __('filasortable::filasortable.Sortable is activated successfully !'));
        }

        return redirect(request()->header('Referer'));
    }

    public function updateSortOrder($itemIds)
    {
        if (! $this->hasSortOrder) {
            return;
        }

        if (empty($itemIds)) {
            return;
        }

        $model = new $this->currentModel;
        $tableName = $model->getTable();

        $caseStatement = 'CASE id';
        $bindings = [];

        foreach ($itemIds as $index => $itemId) {
            $caseStatement .= ' WHEN ? THEN ?';
            $bindings[] = $itemId;
            $bindings[] = $index + 1;
        }

        $caseStatement .= ' END';

        $idPlaceholders = implode(',', array_fill(0, count($itemIds), '?'));
        $bindings = array_merge($bindings, $itemIds);

        $sql = 'UPDATE '.$tableName." SET sort_order = {$caseStatement} WHERE id IN ({$idPlaceholders})";

        DB::statement($sql, $bindings);
    }
}
