<?php

namespace IbrahimBougaoua\FilaSortable;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use IbrahimBougaoua\FilaSortable\Commands\FilaSortableCommand;

class FilaSortableServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('filasortable')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_filasortable_table')
            ->hasCommand(FilaSortableCommand::class);
    }
}
