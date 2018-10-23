# Opencycle 

[![GitHub release](https://img.shields.io/github/release/opencycle/opencycle.svg)](https://github.com/opencycle/opencycle/releases)
 [![Build Status](https://travis-ci.com/opencycle/opencycle.svg?branch=master)](https://travis-ci.com/opencycle/opencycle) [![codecov](https://codecov.io/gh/opencycle/opencycle/branch/master/graph/badge.svg)](https://codecov.io/gh/opencycle/opencycle) [![StyleCI](https://github.styleci.io/repos/146082121/shield?branch=master)](https://github.styleci.io/repos/146082121)

An open source free classified ads platform.

## Requirements

Opencycle is written in [Laravel](https://laravel.com/docs/5.6/installation#server-requirements) 5.6 so the requirements are the same:

* PHP >= 7.1.3
* Composer

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

To set up the daily digest emails you will need to install a crontab entry:

```bash
* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```

## Contributing

Please see [CONTRIBUTING.md](CONTRIBUTING.md)

## TODO

 For v0.1.0:
 
 * Image upload
 * Reply to posts
 * Report a post
 * Group settings
 
https://github.com/rashidlaasri/LaravelInstaller
