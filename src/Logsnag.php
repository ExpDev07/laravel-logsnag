<?php

namespace ExpDev07\Logsnag;

use ExpDev07\Logsnag\Client\LogsnagClient;
use ExpDev07\Logsnag\Client\LogsnagRequest;
use Illuminate\Http\Client\PendingRequest;

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
     */
    public function __construct()
    {
        $this->client = app(LogsnagClient::class);
    }

    /**
     * Logs event to the provided channel.
     *
     * @param string $channel
     * @param string $event
     */
    public function log(string $channel, string $event): void
    {
        $this->client->log(new LogsnagRequest(
            project: config('logsnag.project'),
            channel: $channel,
            event: $event,
            description: 'Test description.',
            icon: '',
            notify: true,
        ));
    }

}
