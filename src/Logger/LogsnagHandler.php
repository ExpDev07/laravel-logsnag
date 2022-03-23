<?php

namespace ExpDev07\Logsnag\Logger;

use ExpDev07\Logsnag\Facades\Logsnag;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;

/**
 *
 */
class LogsnagHandler extends AbstractProcessingHandler
{

    /**
     * The channel.
     *
     * @var string
     */
    public string $channel;

    /**
     * Constructs a new monolog Logsnag handler.
     *
     * @param string $channel
     */
    public function __construct(string $channel)
    {
        parent::__construct();

        $this->channel = $channel;
    }

    /**
     * Writes the record to the log.
     *
     * @param array $record
     */
    protected function write(array $record): void
    {
        Logsnag::log($this->channel, $record['formatted']);
    }

}