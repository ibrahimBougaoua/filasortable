<?php

namespace IbrahimBougaoua\FilaSortable;

use Filament\Contracts\Plugin;
use Filament\Panel;
use IbrahimBougaoua\FilaSortable\Services\SortOrderService;

class FilaSortablePlugin implements Plugin
{
    public function getId(): string
    {
        return 'filasortable';
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public function register(Panel $panel): void
    {
        //
    }

    public function boot(Panel $panel): void
    {
        $this->sortable();
    }

    public function sortable()
    {
        if (app(SortOrderService::class)->canAssetRegister()) {
            app(SortOrderService::class)->sortAddGlobalScope();
        }
    }
}
