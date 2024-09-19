<?php

namespace IbrahimBougaoua\FilaSortable\Tests;

use IbrahimBougaoua\FilaSortable\FilaSortableServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

    }

    protected function getPackageProviders($app)
    {
        return [
            FilaSortableServiceProvider::class,
            \Livewire\LivewireServiceProvider::class,
        ];
    }
}
