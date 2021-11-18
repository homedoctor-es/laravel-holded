Holded SDK integration for Laravel
===================================
Laravel integration for the Holded SDK including a notification channel.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

With Composer installed, you can then install the extension using the following commands:

```bash
$ php composer.phar require homedoctor-es/laravel-holded
```

or add

```json
...
    "require": {
        "homedoctor-es/laravel-holded": "*"
    }
```

to the ```require``` section of your `composer.json` file.

## Configuration

1. Register the ServiceProvider in your config/app.php service provider list.

config/app.php
```php
return [
    //other stuff
    'providers' => [
        //other stuff
        \HomedoctorEs\Laravel\Holded\HoldedServiceProvider::class,
    ];
];
```

2. If you want, you can add the following facade to the $aliases section.

config/app.php
```php
return [
    //other stuff
    'aliases' => [
        //other stuff
        'Holded' => \HomedoctorEs\Laravel\Holded\Facades\Holded::class,
    ];
];
```

3. Publish the Holded provider
```
php artisan vendor:publish --provider="HomedoctorEs\Laravel\Holded\HoldedServiceProvider"
```

4. Set the reference, api_key and base_url in the config/holded.php file.

config/holded.php

```php
return [
    'api_key' => env('HOLDED_API_KEY'),
    'base_url' => env('HOLDED_BASE_URL', 'https://api.holded.com/api/'),
];
```
 
5. Or use .env file
```
HOLDED_API_KEY=
HOLDED_BASE_URL=https://api.holded.com/api/
```

## Usage

You can use the facade alias Holded to execute services of the Holded sdk. The
authentication params will be automatically injected.

```php
$contacts = \HomedoctorEs\Laravel\Holded\Facades\Holded::contact();
```

Or use Laravel Service Container to get The Holded Instance.

```php
app(\HomedoctorEs\Laravel\Holded\Holded::class)->contact();
```

Once you have done this steps, you can use all Holded SDK endpoints as are described in the sdk package documentation.