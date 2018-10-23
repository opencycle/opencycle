## Configuration

Remember to set the `APP_ENV` in your `.env` file to `local` and optionally set `APP_DEBUG` to `true` to enable error reporting.

## Dummy data

You can seed extra dummy data for local development by running the development seeder.

```bash
$ php artisan db:seed --class=DevelopmentSeeder
```

## Testing

Tests are run with [PHPUnit](https://phpunit.de/).

```bash
$ ./vendor/bin/phpunit
```

## Linting

Code must adhere to the [PSR-2](https://www.php-fig.org/psr/psr-2/) coding style. You can lint the project
with [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer) to ensure compliance.

```bash
$ ./vendor/bin/phpcs --standard=PSR2 ./app
```

## Docker

It is possible to run Opencycle locally with Docker.

```bash
$ docker-compose up -d
$ docker-compose run opencycle php artisan migrate
```

This will expose a server on port `8090`
