<?php

namespace IbrahimBougaoua\FilaSortable\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use IbrahimBougaoua\FilaSortable\FilaSortableServiceProvider;

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
