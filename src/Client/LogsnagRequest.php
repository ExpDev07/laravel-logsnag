<?php

namespace ExpDev07\Logsnag\Client;

use Illuminate\Contracts\Support\Arrayable;

class LogsnagRequest implements Arrayable
{

    /**
     * Constructs a new Logsnag request.
     *
     * @param string $project
     * @param string $channel
     * @param string $event
     * @param string $description
     * @param string $icon
     * @param bool $notify
     */
    public function __construct(
        public string $project,
        public string $channel,
        public string $event,
        public string $description,
        public string $icon,
        public bool $notify,
    ) {}

    /**
     * Gets the message as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}