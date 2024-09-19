<?php

namespace IbrahimBougaoua\FilaSortable;

use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Facades\FilamentView;
use Filament\Tables\View\TablesRenderHook;
use Filament\View\PanelsRenderHook;
use IbrahimBougaoua\FilaSortable\Services\SortOrderService;
use Illuminate\Support\Facades\Blade;
use Livewire\Livewire;

class FilaSortable
{
    public function __construct()
    {
        $this->registerSortableButtonComponent();
        $this->registerAlertComponent();
        $this->loadAssets();
    }

    public function loadAssets()
    {
        if (app(SortOrderService::class)->canAssetRegister()) {
            FilamentAsset::register(
                [
                    Css::make('custom-css', __DIR__.'/../resources/css/custom.css'),
                ],
                package: 'ibrahimbougaoua/filasortable'
            );

            FilamentAsset::register(
                [
                    Js::make('sortable-min', __DIR__.'/../resources/js/Sortable.min.js'),
                ],
                package: 'ibrahimbougaoua/filasortable'
            );
        }
    }

    public function registerSortableButtonComponent()
    {
        if (class_exists(\IbrahimBougaoua\FilaSortable\Livewire\SortableActionComponent::class)) {
            Livewire::component('sortable-action-component', \IbrahimBougaoua\FilaSortable\Livewire\SortableActionComponent::class);
        }

        FilamentView::registerRenderHook(
            TablesRenderHook::TOOLBAR_END,
            fn (): string => Blade::render('@livewire(\'sortable-action-component\')'),
        );
    }

    public function registerAlertComponent()
    {
        if (class_exists(\IbrahimBougaoua\FilaSortable\Livewire\MessageComponent::class)) {
            Livewire::component('message-component', \IbrahimBougaoua\FilaSortable\Livewire\MessageComponent::class);
        }

        FilamentView::registerRenderHook(
            PanelsRenderHook::RESOURCE_PAGES_LIST_RECORDS_TABLE_BEFORE,
            fn (): string => Blade::render('@livewire(\'message-component\')'),
        );
    }
}
