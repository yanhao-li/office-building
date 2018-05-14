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
For laravel >= 5.5 that's all, thanks to [Package Discovery](https://laravel.com/docs/5.5/packages#package-discovery).

For laravel <= 5.5, you have to add `Yanhaoli\OfficeBuilding\Providers\OfficeBuildingServiceProvider` to your `config/app.php` providers array:
```php
Yanhaoli\OfficeBuilding\Providers\OfficeBuildingServiceProvider::class,
```


## Usage

1. Config the basis
    Firstly you have to publish the config file with the following command:

    ```php
    php artisan vendor:publish --provider="Yanhaoli\OfficeBuilding\Providers\OfficeBuildingServiceProvider"
    ```

    Now checkout `config/officebuilding.php` and modify it by your needs.

2. Open a new Office for your customer

    ``` php
    <?php

    namespace App\Http\Controller;
    use OfficeBuilding;
    use App\Company;

    class CompanyController extends Controller
    {
      public function create(Request $request)
      {
        $company_name = $request->input('name');
        $database_name = OfficeBuilding::addOffice($company_name);
        $company = new Company;
        $company->name = $company_name;
        $company->database_name = $database_name;
        $company->save();
        return response('created', 201);
      }
    }
    ```

3. Handle request for a specific office. Ex, Get all employees of that office

    use OfficeBuilding::visit method to switch database connection to a specific office, with a callback method to handle request, the connection will be revert to the previous status after task completed.

    ```php
    <?php

    namespace App\Http\Controller;
    use OfficeBuilding;
    use App\OfficeBuilding\Employee;

    class OfficeEmployeeController extends Controller
    {
      public function browse(Request $request, $office_id)
      {
        $employees = OfficeBuilding::visit($office_id, function(){
          return Employee::all();
        });

        return response($employees, 200);
      }
    }
    ```

## Contributing
Welcome any contributions for issue fix or functionality improvement.

## Security Vulnerabilities

If you discover a security vulnerability , please shot me an email at hi@yanhaoli.com.

## License

The MIT License (MIT). Please see [MIT license](http://opensource.org/licenses/MIT) for more information.
