<?php

namespace ExpDev07\Logsnag;

use ExpDev07\Logsnag\Client\LogsnagClient;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LogsnagServiceProvider extends PackageServiceProvider
{

    /**
     * Configures the package.
     *
     * @param Package $package
     */
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-logsnag')
            ->hasConfigFile();

        $this->registerContainerBindings();
    }

    /**
     * Registers the container bindings.
     */
    protected function registerContainerBindings(): void
    {
        $this->app->instance(LogsnagClient::class, new LogsnagClient(
            token: config('logsnag.token', ''),
        ));
    }

}
