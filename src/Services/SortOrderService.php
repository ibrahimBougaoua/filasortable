<?php

namespace IbrahimBougaoua\FilaSortable\Services;

use IbrahimBougaoua\FilaSortable\Scopes\SortOrderScope;
use IbrahimBougaoua\FilaSortable\Traits\CurrentModelName;
use IbrahimBougaoua\FilaSortable\Traits\SortOrder;

class SortOrderService
{
    use CurrentModelName;
    use SortOrder;

    public $currentModel;

    public function __construct()
    {
        $this->currentModel = CurrentModelName::getModelClassFromRoute();
    }

    public function canAssetRegister(): bool
    {
        return SortOrder::isSortOrderExist($this->currentModel);
    }

    public function getModelClass(): string
    {
        return $this->currentModel;
    }

    public function sortAddGlobalScope(): void
    {
        if ($this->currentModel) {
            $this->currentModel::addGlobalScope(new SortOrderScope);
        }
    }
}
