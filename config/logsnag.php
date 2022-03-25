<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Logsnag.
    |--------------------------------------------------------------------------
    |
    | Configure the Logsnag options.
    |
    */

    /**
     * The project name.
     */
    'project' => env('LOGSNAG_PROJECT', 'laravel'),

    /**
     * The API token.
     */
    'token' => env('LOGSNAG_TOKEN', ''),

    /**
     * A mapping of icons for logging.
     */
    'icons' => [
        'DEBUG'     => 'ℹ️',
        'INFO'      => 'ℹ️',
        'NOTICE'    => '📌',
        'WARNING'   => '⚠️',
        'ERROR'     => '⚠️',
        'CRITICAL'  => '🔥',
        'ALERT'     => '🔔️',
        'EMERGENCY' => '💀',
    ],

];
