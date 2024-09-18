<?php

namespace IbrahimBougaoua\FilaSortable;

use IbrahimBougaoua\FilaSortable\Commands\FilaSortableCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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
