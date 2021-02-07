# Expose all models as CRUD, search and query API

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tantee/laravel-model-api.svg?style=flat-square)](https://packagist.org/packages/tantee/laravel-model-api)
[![Total Downloads](https://img.shields.io/packagist/dt/tantee/laravel-model-api.svg?style=flat-square)](https://packagist.org/packages/tantee/laravel-model-api)


This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require tantee/laravel-model-api
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="TaNteE\LaravelModelApi\LaravelModelApiServiceProvider" --tag="laravel-model-api-migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="TaNteE\LaravelModelApi\LaravelModelApiServiceProvider" --tag="laravel-model-api-config"
```

This is the contents of the published config file:

```php
return [
  'route-prefix' => 'api',
  'route-middleware' => ['api'],
];
```

## Usage

All of models can be exposed as API with CRUD functions. Complete manual will be written soon.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [TaNteE](https://github.com/tantee)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
