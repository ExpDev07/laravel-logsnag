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
        'DEBUG'     => 'âšī¸',
        'INFO'      => 'âšī¸',
        'NOTICE'    => 'đ',
        'WARNING'   => 'â ī¸',
        'ERROR'     => 'â ī¸',
        'CRITICAL'  => 'đĨ',
        'ALERT'     => 'đī¸',
        'EMERGENCY' => 'đ',
    ],

];
