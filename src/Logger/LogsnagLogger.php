<?php

namespace ExpDev07\Logsnag\Logger;

use Arr;
use Monolog\Logger;

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
        [$channel] = $config;

        return new Logger('logsnag', Arr::wrap(new LogsnagHandler($channel)));
    }

}