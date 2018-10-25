# Opencycle 

[![GitHub release](https://img.shields.io/github/release/opencycle/opencycle.svg)](https://github.com/opencycle/opencycle/releases)
 [![Build Status](https://travis-ci.com/opencycle/opencycle.svg?branch=master)](https://travis-ci.com/opencycle/opencycle) [![codecov](https://codecov.io/gh/opencycle/opencycle/branch/master/graph/badge.svg)](https://codecov.io/gh/opencycle/opencycle) [![StyleCI](https://github.styleci.io/repos/146082121/shield?branch=master)](https://github.styleci.io/repos/146082121)

An open source free classified ads platform.

## Requirements

Opencycle is written in [Laravel](https://laravel.com/docs/5.7/installation#server-requirements) 5.7 so the requirements are the same:

* PHP >= 7.1.3
* Composer
* Database (eg: MySQL, PostgreSQL, SQLite)

## Installation

The easiest way to install and configure Opencycle is with Git and the built in installer.

```bash
$ git clone git@github.com:opencycle/opencycle.git .
$ composer install
$ php artisan opencycle:install
```

For more information and other methods please see the [Installation Instructions](https://github.com/opencycle/opencycle/wiki/Installation) on the Wiki.

## Contributing

We encourage pull requests from anyone. To do so, please fork and clone this repo.
You work should then be done on a new feature branch. Once ready please
[submit a pull request](https://github.com/opencycle/opencycle/compare/)
with your changes.

Once Travis has passed we will try to review your request as soon as possible.

Please keep in mind:

* Write tests
* Follow the PSR-2 style guide
* Add a detailed commit message

For more information please see the [Development Instructions](https://github.com/opencycle/opencycle/wiki/Development) of the Wiki.

## License

Opencycle is released under the [GPLv3 license](LICENSE)

## TODO

 For v0.1.0:
 
 * Image upload
 * Reply to posts
 * Report a post
 * Group settings
 * SEO
 * Alerts
 * Error pages
 * Style emails
 * Search
 * Create a group
 * Post types
 * Member count on group page
 * Group files and links?
 * Web installer? - https://github.com/rashidlaasri/LaravelInstaller
 * Captcha
 * TOS/Privacy policy
 * Social logins
 * Multi language?
 * Post expiry
