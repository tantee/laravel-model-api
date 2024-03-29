<?php

namespace TaNteE\LaravelModelApi;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelModelApiServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-model-api')
            ->hasConfigFile()
            ->hasMigration('create_assets_table')
            ->hasMigration('create_revisions_table');
    }
}
