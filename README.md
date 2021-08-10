# Laravel Bricklink API
This pacakge is a Laravel wrapper for the `davesweb/bricklink-api` package. It adds a config file for your Bricklink credentials, a service provider which registers everything correctly for dependency injection, and an autodiscover to the `davesweb/bricklink-api` package. Other functionality stays the same. 

## Installation
Via composer:
`composer require davesweb/laravel-bricklink-api`

After installation, publish the config file with `php artisan vendor:publish --provider="Davesweb\\LaravelBicklinkApi\\ServiceProvider"`.

## Documentation
This package needs 4 new environment variables:

```
BRICKLINK_CONSUMER_KEY=
BRICKLINK_CONSUMER_SECRET=
BRICKLINK_TOKEN_VALUE=
BIRCKLINK_TOKEN_SECRET=
```

You can find the values for these in your Bricklink account.

For documentation on how to use the API after installation please refer to the [davesweb/bricklink-api](https://github.com/davesweb/bricklink-api) package.
