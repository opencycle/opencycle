# Contributing

We encourage pull requests from anyone. To do so, please fork and clone this repo.
You work should then be done on a new feature branch. Once ready please
[submit a pull request](https://github.com/opencycle/opencycle/compare/)
with your changes.

Once Travis has passed we will try to review your request as soon as possible.

Please keep in mind:

* Write tests
* Follow the PSR-2 style guide
* Add a detailed commit message

## Configuration

Remember to set the `APP_ENV` in your `.env` file to `local` and optionally set `APP_DEBUG` to `true` to enable error reporting.

## Dummy data

You can seed dummy data for local development by running the development seeder:

```bash
$ php artisan db:seed --class=DevelopmentSeeder
```

## Testing

Tests are run with [PHPUnit](https://phpunit.de/)

```bash
$ ./vendor/bin/phpunit
```

## Linting

Code must adhere to the [PSR-2](https://www.php-fig.org/psr/psr-2/) coding style. You can lint the project
with [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer) to ensure compliance.

```bash
$ ./vendor/bin/phpcs --standard=PSR2 ./app
```
