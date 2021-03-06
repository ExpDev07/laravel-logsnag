<?php

namespace ExpDev07\Logsnag;

use ExpDev07\Logsnag\Client\LogsnagClient;
use ExpDev07\Logsnag\Client\LogsnagRequest;

/**
 * The Logsnag logger.
 */
class Logsnag
{

    /**
     * The Logsnag client.
     *
     * @var LogsnagClient
     */
    protected LogsnagClient $client;

    /**
     * Constructs a new Logsnag.
     *
     * @param LogsnagClient $client
     */
    public function __construct(LogsnagClient $client)
    {
        $this->client = $client;
    }

    /**
     * Logs event to the provided channel.
     *
     * @param string $channel
     * @param string $event
     * @param string|null $description
     * @param string|null $icon
     * @param bool $notify
     */
    public function log(string $channel, string $event, string $description = null, string $icon = null, bool $notify = false): void
    {
        $this->client->log(new LogsnagRequest(
            project: config('logsnag.project'),
            channel: $channel,
            event: $event,
            description: $description,
            icon: $icon,
            notify: $notify,
        ));
    }

}
