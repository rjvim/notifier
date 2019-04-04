## Installation

You can install the package via composer:

``` bash
composer require rjvim/notifier
```

The package will automatically register itself.

You can publish the migration with:
```bash
php artisan vendor:publish --provider="Betalectic\Notifier\NotifierServiceProvider" --tag="migrations"
```

```bash
php artisan migrate
```

You can optionally publish the config file with:
```bash
php artisan vendor:publish --provider="Betalectic\Notifier\NotifierServiceProvider" --tag="config"
```

## Documentation




## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
