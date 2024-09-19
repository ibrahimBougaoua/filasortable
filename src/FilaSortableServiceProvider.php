<?php

namespace IbrahimBougaoua\FilaSortable;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilaSortableServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filasortable';

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('filasortable')
            ->hasAssets();

        if (file_exists($package->basePath('/../resources/views'))) {
            $package->hasViews();
        }

        if (file_exists($package->basePath('/../resources/lang'))) {
            $package->hasTranslations();
        }
    }

    public function packageBooted(): void
    {
        app(FilaSortable::class);
    }
}
