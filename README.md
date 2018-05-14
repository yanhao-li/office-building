<p align="center">
  <img src="http://yanhaoli.com/office-building/logo.svg" />
</p>

# Office Building
[![Travis](https://img.shields.io/travis/yanhao-li/office-building.svg)](https://travis-ci.org/yanhao-li/office-building) ![license](https://img.shields.io/github/license/mashape/apistatus.svg) [![PRs Welcome](https://img.shields.io/badge/PRs-welcome-brightgreen.svg)](CONTRIBUTING.md#pull-requests)

Office Building is an easy to use Laravel package to help you build the Multi-tenant SaaS with database-per-tenant.
Support Laravel 5.3+

## Installation

Install Office Building via Composer:

```bash
composer require yanhaoli/office-building
```
For laravel >= 5.5 that's all due to [Package Discovery](https://laravel.com/docs/5.5/packages#package-discovery).

For laravel <= 5.5, you have to add `Yanhaoli\OfficeBuilding\Providers\OfficeBuildingServiceProvider` to your `config/app.php` providers array:
```php
Yanhaoli\OfficeBuilding\Providers\OfficeBuildingServiceProvider::class,
```


## Usage

``` php
//
```

## Contributing
Welcome any contributions for issue fix or functionality improvement.

## Security Vulnerabilities

If you discover a security vulnerability , please shot me an email at hi@yanhaoli.com.

## License

The MIT License (MIT). Please see [MIT license](http://opensource.org/licenses/MIT) for more information.
