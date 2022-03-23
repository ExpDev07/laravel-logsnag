<?php

namespace ExpDev07\Logsnag\Facades;

use Illuminate\Support\Facades\Facade;
use RuntimeException;

/**
 * Facade for Logsnag.
 *
 * @see \ExpDev07\Logsnag\Logsnag
 *
 * @method static void log(string $channel, string $event)
 */
class Logsnag extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     * @throws RuntimeException
     */
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-logsnag';
    }

}
