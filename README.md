
# laravel-logsnag

[![Latest Version on Packagist](https://img.shields.io/packagist/v/expdev07/laravel-logsnag.svg?style=flat-square)](https://packagist.org/packages/expdev07/laravel-logsnag)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/expdev07/laravel-logsnag/run-tests?label=tests)](https://github.com/expdev07/laravel-logsnag/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/expdev07/laravel-logsnag/Check%20&%20fix%20styling?label=code%20style)](https://github.com/expdev07/laravel-logsnag/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/expdev07/laravel-logsnag.svg?style=flat-square)](https://packagist.org/packages/expdev07/laravel-logsnag)

Get a realtime feed of your Laravel project’s most important events using Logsnag. Supports push notifications straight to your 
phone. 

## Support me

I create Open Source software in my spare time. If you wish to support me, consider buying me a coffee :).

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

    'project' => env('LOGSNAG_PROJECT', 'laravel'),

    'token' => env('LOGSNAG_TOKEN', ''),

];
```

Add the Logsnag channel to your logging config:

```php
'channels' => [
    //...
    'logsnag' => [
        'driver'  => 'custom',
        'via'     => ExpDev07\Logsnag\Logger\LogsnagLogger::class,
        'project' => 'my-project',
        'channel' => 'my-channel',
    ],
];
```

## Usage

Using logger:

```php
use Illuminate\Support\Facades\Log;
 
Log::channel('logsnag')->info('An error occurred!');
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
