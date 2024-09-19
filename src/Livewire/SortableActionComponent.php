<?php

namespace IbrahimBougaoua\FilaSortable\Livewire;

use IbrahimBougaoua\FilaSortable\Livewire\Traits\SortOrderAction;
use IbrahimBougaoua\FilaSortable\Traits\CurrentModelName;
use IbrahimBougaoua\FilaSortable\Traits\SortOrder;
use Livewire\Component;

class SortableActionComponent extends Component
{
    use CurrentModelName;
    use SortOrder;
    use SortOrderAction;

    public $currentModel;

    public function mount()
    {
        $this->currentModel = CurrentModelName::getModelClassFromRoute();
        $this->hasSortOrder = SortOrder::isSortOrderExist($this->currentModel);
    }

    public function render()
    {
        return view('filasortable::livewire.sortable-action-component');
    }
}
