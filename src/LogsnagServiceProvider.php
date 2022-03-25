<?php

namespace ExpDev07\Logsnag;

use ExpDev07\Logsnag\Client\LogsnagClient;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

/**
 * The Logsnag service provider.
 */
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
        // Create client.
        $client = new LogsnagClient(config('logsnag.token', ''));

        // Bind to container.
        $this->app->instance(Logsnag::class, new Logsnag($client));
        $this->app->instance(LogsnagClient::class, $client);
    }

}
