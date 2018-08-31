# Opencycle 

[![GitHub release](https://img.shields.io/github/release/opencycle/opencycle.svg)](https://github.com/opencycle/opencycle/releases)
 [![Build Status](https://travis-ci.com/opencycle/opencycle.svg?branch=master)](https://travis-ci.com/opencycle/opencycle) [![codecov](https://codecov.io/gh/opencycle/opencycle/branch/master/graph/badge.svg)](https://codecov.io/gh/opencycle/opencycle)

An open source free classified ads platform.

## Server Requirements

Opencycle is written in [Laravel](https://laravel.com/docs/5.6/installation#server-requirements) 5.6 so the requirements are the same:

* PHP >= 7.1.3

## Installation

Either git clone the repository:

```bash
$ git clone git@github.com:opencycle/opencycle.git .
```

Or download and extract the latest package from the [releases](https://github.com/opencycle/opencycle/releases) page.

Then you will need to install and run [Composer](https://getcomposer.org/) to install the dependencies:

```bash
$ composer install
```

## Configuration

First you will need to generate an application key:

```bash
$ php artisan key:generate
```

Then copy `.env.example` to `.env` and modify the values for your setup.

Finally you need to seed your database with required initial data:

```bash
$ php artisan db:seed
```

## Development

Remember to set the `APP_ENV` in your `.env` file to `local` and optionally set `APP_DEBUG` to `true` to enable error reporting.

#### Dummy data

You can seed dummy data for local development by running the development seeder:

```bash
$ php artisan db:seed --class=DevelopmentSeeder
```

#### Testing

Tests are run with [PHPUnit](https://phpunit.de/)

```bash
$ ./vendor/bin/phpunit
```

#### Linting

Code must adhere to the [PSR-2](https://www.php-fig.org/psr/psr-2/) coding style. You can lint the project
with [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer) to ensure compliance.

```bash
$ ./vendor/bin/phpcs --standard=PSR2 ./app
```

#### Contributing

Please see [CONTRIBUTING.md](CONTRIBUTING.md)
