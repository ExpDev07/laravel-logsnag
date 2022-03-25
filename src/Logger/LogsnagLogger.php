<?php

namespace ExpDev07\Logsnag\Logger;

use Illuminate\Support\Arr;
use Monolog\Logger;

/**
 * The Laravel Logsnag logger.
 */
class LogsnagLogger
{

    /**
     * Creates a new Monologger with Logsnag handler.
     *
     * @param array $config
     * @return Logger
     */
    public function __invoke(array $config): Logger
    {
        // Create handler.
        $handler = new LogsnagHandler(
            channel: $config['channel'],
            notify: $config['notify'] ?? false,
            level: Logger::toMonologLevel($config['level'] ?? 'debug'),
        );

        return new Logger('logsnag', Arr::wrap($handler));
    }

}