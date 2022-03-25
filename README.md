
# laravel-logsnag

[![Latest Version on Packagist](https://img.shields.io/packagist/v/expdev07/laravel-logsnag.svg?style=flat-square)](https://packagist.org/packages/expdev07/laravel-logsnag)
[![Total Downloads](https://img.shields.io/packagist/dt/expdev07/laravel-logsnag.svg?style=flat-square)](https://packagist.org/packages/expdev07/laravel-logsnag)

Get a realtime feed of your Laravel project’s most important events using [Logsnag](https://logsnag.com/). Supports push notifications straight to your 
phone. 

**Get notified:**
1. In the [Logsnag dashboard](https://app.logsnag.com/dashboard).
2. On your desktop/laptop (windows + macOS).
3. On your phone (android + iOS).

## Support me

I create Open Source software in my spare time. If you wish to support me, consider buying me a coffee :).

<p>
<a href='https://ko-fi.com/C1C510DUQ' target='_blank'>
<img height='36' style='border:0px;height:36px;' src='https://az743702.vo.msecnd.net/cdn/kofi3.png?v=2' border='0' alt='Buy Me a Coffee at ko-fi.com' />
</a>
</p>

## Beta

Logsnag is currently in beta mode, and you must join the waitlist in order to use it. However, they accept people 
fairly quickly. Join on their website here: [https://logsnag.com/](https://logsnag.com/).

## Requirements

* PHP 8+
* Laravel 9

## Installation

You can install the package via composer:

```bash
composer require expdev07/laravel-logsnag
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="logsnag-config"
```

This is the contents of the published config file:

```php
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
```

Add the Logsnag channel to your logging config:

```php
'channels' => [
    //...
    'logsnag' => [
        'driver'  => 'custom',
        'via'     => ExpDev07\Logsnag\Logger\LogsnagLogger::class,
        'level'   => 'debug',
        'project' => 'my-project',
        'channel' => 'my-channel',
        'notify'  => true,         
    ],
];
```

## Usage

Using logger:

```php
use Illuminate\Support\Facades\Log;
 
Log::channel('logsnag')->emergency('There is an emergency! Please fix ASAP.');
```

Using facade:

```php
use ExpDev07\Logsnag\Facades\Logsnag;
 
Logsnag::log('my-channel', 
    event: 'New subscriber!', 
    description: 'Someone just subscribed to MySaaS Pro at $9.99', 
    icon: '🤑', 
    notify: true,
);
```

Using client:

```php
use ExpDev07\Logsnag\Client\LogsnagClient;

app(LogsnagClient::class)->log(new LogsnagRequest(
    project: 'project-name',
    channel: 'channel',
    event: 'Test event',
    description: 'This is a description for test event',
    icon: '😊',
    notify: true,
));
```

## Parameters

* **project:** The logsnag project name.
* **channel:** The channel to log in. Must be lowercase and hyphenated.
* **event:** The event name.
* **description:** The event description.
* **icon:** Associate the log with an icon (emoji).
* **notify:** Whether to send push notifications to devices.

See [Logsnag Log](https://sh4yy.notion.site/LogSnag-API-e942b03305c94d4fa72c8a3d24a0ad49#eb98c978cec841d0ab50d52be6eb9f80) route for more information.

## Screenshots

A log about a new subscriber in the Logsnag dashboard.

<img src="https://raw.githubusercontent.com/ExpDev07/laravel-logsnag/main/.github/screenshots/dashboard_notification_1.png" alt="Dashboard Notification 1" />

A log about an app emergency in the Logsnag dashboard.

<img src="https://raw.githubusercontent.com/ExpDev07/laravel-logsnag/main/.github/screenshots/dashboard_notification_2.png" alt="Dashboard Notification 2" />

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [ExpDev07](https://github.com/ExpDev07)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
