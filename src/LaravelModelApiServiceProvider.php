<?php

namespace TaNteE\LaravelModelApi;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use TaNteE\LaravelModelApi\Commands\LaravelModelApiCommand;

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
            ->hasViews()
            ->hasMigration('create_laravel_model_api_table')
            ->hasCommand(LaravelModelApiCommand::class);
    }
}
